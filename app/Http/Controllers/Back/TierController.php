<?php

namespace App\Http\Controllers\Back;

use App\Models\Tier;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
  
            $data = DB::table("tiers")
            ->select('tiers.*');

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
        
        return view('back.tiers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function show(Tier $tier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function edit(Tier $tier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tier $tier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tier $tier)
    {
        //
    }
}
