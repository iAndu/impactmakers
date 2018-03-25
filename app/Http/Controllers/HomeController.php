<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Institution;
use App\InstitutionType;
use App\Photo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::all();
        $institution_types = InstitutionType::all();
        $photos = Photo::all();
        
        if ($photos->count() > 9) {
            $photos = $photos->random(9);
        }

        return view('index', compact('institutions', 'institution_types', 'photos'));
    }
}
