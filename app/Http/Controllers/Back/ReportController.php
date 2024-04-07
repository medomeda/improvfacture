<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Models\Report;
use App\Models\Producteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Jimmyjs\ReportGenerator\ReportMedia\ExcelReport;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a4",
            "dpi" => 130
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reportQuery = Report::query();
        $reportQuery->where('name', 'like', '%'.request('q').'%');
        $reports = $reportQuery->paginate(10);
        return view('back.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report = new Report();
        return view('back.reports.create', compact('report'));
 
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
            'name' => 'required|max:100',
            //'querytype' => 'required',
            //'querytext' => 'required',
            //'groupe'=> 'required',
        ]);
       
        $report = Report::create($request->all());

        return redirect()->route('admin.reports.index')->with('success',"Création Report réussie !");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrfail($id);
        $reports = DB::table('regions')
            ->join('departements', 'departements.region_id', '=', 'regions.id')
            ->leftjoin('fiches', function ($join) {
                $join->on('fiches.region_id', '=', 'regions.id');
                $join->on('fiches.departement_id', '=', 'departements.id');
            })
            ->leftjoin('producteurs', 'producteurs.fiche_id', '=', 'fiches.id')
            ->leftJoin('parcelles', 'parcelles.fiche_id', '=','fiches.id')
            ->select('regions.name as region', 'departements.name as departement',
            DB::raw('count(*) as nbproducteurs'),
            DB::raw('count(parcelles.id) as nbparcelles'),
            DB::raw('IFNULL(sum(parcelles.superficie),0) as totsuperficies'))
            ->groupBy('region','departement')
            ->get();

            //dd($reports);
        return view('back.reports.etat-listeproducteurs', compact('report','reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::findOrfail($id);
      
        return view('back.reports.edit',compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|max:100',
            //'querytype' => 'required',
            //'querytext' => 'required',
            //'groupe'=> 'required',
        ]);
       

        $report = Report::findOrFail($id);
     
        $report->update($request->all());
        
        return redirect()->route('admin.reports.index')->with('success',"Modification Report réussie !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('admin.reports.index')->with('success',"Suppression Report réussie !");
    }

  
    public function generatePDF(Request $request)
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = \PDF::loadView('back.reports.myPDF', $data);
       
        $items = DB::table("users")->get();

        $html = '<html><body>'; 
        foreach ($items as $details) 
        { 
            $html.= $details->name . "<br>"; 
        } 
        $html .= '</body></html>'; 
        $pdf = \PDF::loadHTML($html);

        return $pdf->stream(); 
      
      

        //return $pdf->stream('invoice.pdf');
  
        //return $pdf->download('itsolutionstuff.pdf');
    }
     
    public function pdfview(Request $request)
    {
             
        $items = DB::table("producteurs")->get();
        view()->share('items',$items);

        if($request->has('download')){
            $pdf = \PDF::loadView('back.reports.etatproducteur');
            return $pdf->download('producteur.pdf');
        }

        return view('back.reports.etatproducteur');
    }

    public function etatproducteur(Request $request) {
        
        $pdf = \PDF::loadFile(public_path("reports/etatproducteur.html"));

        return $pdf->stream();

    }

    public function displayReport(Request $request, $id)
    {    
        $report = Report::findOrFail($id);
        
        $title = $report->name; // Report title

        $meta = [];

        $queryBuilder = DB::table('producteurs')
            ->join('fiches', 'producteurs.fiche_id', '=', 'fiches.id')
            ->leftJoin('parcelles', 'parcelles.fiche_id', '=','fiches.id')
            ->join('regions', 'fiches.region_id', '=', 'regions.id')
            ->join('departements', 'fiches.departement_id', '=', 'departements.id')
            ->select('regions.name as region', 'departements.name as departement',
            DB::raw('count(*) as nbproducteurs'),
            DB::raw('count(parcelles.id) as nbparcelles'),
            DB::raw('IFNULL(sum(parcelles.superficie),0) as totsuperficies'))
            ->groupBy('region','departement');
            //->get();
        
        //dd($queryBuilder);
           
        

        $columns = [ // Set Column to be displayed
            'Région' => 'region',
            'Departement' => 'departement',
            'Producteurs recensés' => 'nbproducteurs',
            'Nombre de vergés décrits' => 'nbparcelles',
            'Superficie total déclarées' => 'totsuperficies',
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return \PdfReport::of($title, $meta, $queryBuilder, $columns)
            ->showNumColumn(false) // Hide number column
            ->editColumns([
                'Producteurs recensés',
                'Nombre de vergés décrits',
                'Superficie total déclarées'
            ], [
                'class' => 'right bold'
            ])
            ->showTotal([
                'Producteurs recensés' => 'point',
                'Nombre de vergés décrits' => 'point',
                'Superficie total déclarées' => 'point'
            ])
            ->stream(); //stream();*/ // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()

    }

    public function listing() {
        $reports = Report::paginate(10);
        return  view('back.reports.listing',compact('reports'));
    }


    public function pivotTable(Request $request) {
        return view('back.reports.pivottable');
    }

    public function graphique() {
        $reports = Report::paginate(10);
        return  view('back.reports.graphique', compact('reports'));
    }


    

}
