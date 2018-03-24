<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionTypeRequest as Request;

use DB;
use App\InstitutionType;
use App\Icon;

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
        $icons = Icon::all();

        return view('admin.institution_types.create',  compact('icons'));       
    }

    /**
     * Store
     * @return [type] [description]
     */
    public function store(Request $request)
    {
        dd($request->all());
        return redirect('institution-types-index');
    }


    public function index()
    {
        $institutionTypes = InstitutionType::all();

        return view('admin.institution_types.index', compact('institutionTypes'));
    }
}
