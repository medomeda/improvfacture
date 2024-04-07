<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QCod\AppSettings\SavesSettings;

class SettingsController extends Controller
{
    use SavesSettings;
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        
    }

    public function tables(Request $request) {

        return view('back.settings.tables');
    }
}
