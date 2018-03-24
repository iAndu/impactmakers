<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use App\InstitutionType;
use App\Institution;

class MapController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function index()
    {

        $marker = array();
        $marker['lat'] = -33.91721;
        $marker['long'] = 151.22630;

        $institutions = Institution::all();

        return view('map', compact('institutions'));
    }
}
