<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class AuditController extends Controller
{
    public function index()
    {
        $audits = Activity::with('causer')->latest()->paginate(10);
        //dd($audits);
        return view('back.audits.index', compact('audits'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attributes =  [];
        $old = [];
        $browser = [];

        $audit = Activity::findOrFail($id);
        $collection = collect(json_decode($audit->properties, true));
        if(count($collection)>0) {
            if($collection->has('attributes'))  
                $attributes = $collection['attributes'];   
            if($collection->has('old'))
                $old = $collection['old']; 
            if($collection->has('agent'))
                $browser = $collection['agent']; 
        }
        return view('back.audits.show', compact('audit','attributes','old','browser'));

    }




}
