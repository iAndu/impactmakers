<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class InstitutionsController extends Controller
{
    public function index()
    {
        $institutions = Institution::all();

        return view('admin.index', compact('institutions'));
    }

    public function update(Institution $institution)
    {
        $institution->update([
            'status' => !$institution->status
        ]);

        return response()->json('success');
    }
}
