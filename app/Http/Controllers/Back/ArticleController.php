<?php

namespace App\Http\Controllers\Back;

use App\Models\Tva;
use App\Models\Unite;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Typearticle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
  
            $data = DB::table("articles")
            ->leftJoin('categories', 'articles.categorie_id', '=','categories.id')
            ->leftJoin('tvas', 'articles.tva_id', '=','tvas.id')
            ->leftJoin('typearticles', 'articles.typearticle_id', '=','typearticles.id')
            
            ->when($request->get('categorie'), function($query) use ($request) {
                $query->where('categorie_id',  $request->get('categorie')); 
            })->when($request->get('typearticle'), function($query) use ($request) {
                $query->Where('typearticle_id', $request->get('typearticle')); 
            })->when($request->get('q'), function($query) use ($request) {
                $query->Where('articles.reference', 'like', '%'. $request->get('q'). '%' );
                $query->orWhere('articles.designation', 'like', '%'. $request->get('q'). '%' );
                $query->orWhere('articles.description', 'like', '%'. $request->get('q'). '%' );

            })->select('articles.*','typearticles.name as nametypearticle','categories.name as namecateg','tvas.taux as tauxtva');

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('actions', function ($row) {
                    $crudRoutePart = 'articles';
                    return view('partials.datatablesActions2', compact(
                        'crudRoutePart',
                        'row'
                    ));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $typearticles = Typearticle::pluck('name','id');
        $categories = Categorie::pluck('name', 'id');
        
        return view('back.articles.index', compact('typearticles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        $categories = Categorie::pluck('name','id');
        $typearticles = Typearticle::pluck('name','id');
        $unites = Unite::pluck('name','id');
        $marques = Marque::pluck('name','id');
        $modeles = Modele::pluck('name','id');
        $tvas = Tva::get()->pluck('tva_name_taux','id');

        return view('back.articles.create', compact('article','categories','typearticles','unites','marques','modeles','tvas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference'=> 'required|unique:articles',
            'designation' => 'required', 
            'categorie_id' =>'required', 
            'unite_id' =>'required', 
            'marque_id' =>'required', 
            'modele_id' =>'required', 
            'tva_id' =>'required', 
        ]);

        if($request->has('photo')) {
            $filePhoto = $request->photo->store('/articles', 'public');
            $request->merge(['photo' =>  $filePhoto ]);
        }

        $article = Article::create($request->all());

        return redirect()->route('admin.articles.index')
        ->with(array(
            'message' => 'Création Catégorie réussie !', 
            'alert-type' => 'success'
        ));
        //->with('success',"Création Article réussie !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::findOrfail($article->id);

        $categories = Categorie::pluck('name','id');
        $typearticles = Typearticle::pluck('name','id');
        $unites = Unite::pluck('name','id');
        $marques = Marque::pluck('name','id');
        $modeles = Modele::pluck('name','id');
        $tvas = Tva::get()->pluck('tva_name_taux','id');

        return view('back.articles.edit', compact('article','categories','typearticles','unites','marques','modeles','tvas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'reference'=> ['required', Rule::unique('articles')->ignore($article->id),],
            'designation' => 'required', 
            'categorie_id' =>'required', 
            'unite_id' =>'required', 
            //'marque_id' =>'required', 
            //'modele_id' =>'required', 
            'tva_id' =>'required', 
        ]);

        $article = Article::findOrFail($article->id);

        if($request->has('photo')) {
            if (Storage::disk('public')->exists($article->photo)) {
                Storage::disk('public')->delete($article->photo);
            }
            $filePhoto = $request->photo->store('/articles', 'public');
            $request->merge(['photo' =>  $filePhoto]);
        }

        $article->update($request->all());
        
        return redirect()->route('admin.articles.index')
        ->with(array(
            'message' => 'Modification Article réussie !', 
            'alert-type' => 'success'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article = Article::findOrFail($article->id);
        $article->delete();
        return redirect()->route('admin.articles.index')
        ->with(array(
            'message' => 'Suppression Article réussie !', 
            'alert-type' => 'success'
        ));
        //->with('success',"Suppression Article réussie !");
  
    }
}
