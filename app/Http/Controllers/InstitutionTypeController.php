<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionTypeRequest as Request;
use Illuminate\Support\Facades\Storage;

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


    public function index()
    {
        $institutionTypes = InstitutionType::all();

        return view('admin.institution_types.index', compact('institutionTypes'));
    }


    public function store(Request $request)
    {
        $icons = [];
        $disk   ='public';
        
        if ($request->file('icon') && $request->has_upload=='true') {
            $icon = $request->file('icon');
            
            $file_content = file_get_contents($icon);
            $filename = md5(uniqid('', true)).'.'.$icon->extension();

            Storage::disk($disk)->put(config('paths.institution_type_icons') . $filename, $file_content);

            $icon = [
                'name'  => $request->marker_name,
                'path'  => 'storage/' . config('paths.institution_type_icons') . $filename
            ];

            $newIcon = Icon::create($icon);

            $institutionType = [
                'name' => $request->institution_type,
                'icon_id' => $newIcon->id,
            ];

            InstitutionType::create($institutionType);

            return redirect('/institution-types');
        }

        $institutionType = [
            'name' => $request->institution_type,
            'icon_id' => $request->icon_id,
        ];

        InstitutionType::create($institutionType);

        return redirect('/institution-types');
        
    }

    public function delete($id) {
        $institutionType = InstitutionType::find($id);
        $institutionType->delete();

        return redirect('/institution-types');
    }
}
