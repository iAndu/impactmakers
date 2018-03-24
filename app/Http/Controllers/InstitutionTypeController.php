<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use App\InstitutionType;

class InstitutionTypeController extends Controller
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

    /**
     * Create new institution type
     * @return Response
     */
    public function create()
    {
        return view('admin.institution_types.create');        
    }

    /**
     * Store
     * @return [type] [description]
     */
    public function store()
    {
        
    }


    public function index()
    {
        $institutionTypes = InstitutionType::all();

        return view('admin.institution_types.index', compact('institutionTypes'));
    }
}
