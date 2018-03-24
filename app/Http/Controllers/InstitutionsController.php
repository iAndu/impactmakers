<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class InstitutionsController extends Controller
{
    public function index(Request $request)
    {
        $query = Institution::query();

        if ($request->has('type')) {
            $query = $query->whereIn('institution_type', $request->type);
        }

        $institutions = $query->get();

        return view('admin.institutions.index', compact('institutions'));
    }

    public function update(Institution $institution)
    {
        $institution->update([
            'status' => !$institution->status
        ]);

        return response()->json([
            'status' => 'success',                
            'institution' => $institution
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'ratio' => $request->females / ($request->females + $request->males) * 100
        ]);
        $institution = Institution::create($request->all());

        return response()->json([
            'status' => 'success',
            'institution' => $institution
        ]);
    }

    public function delete(Institution $institution)
    {
        $institution->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
