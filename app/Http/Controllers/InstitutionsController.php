<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\InstitutionRating;
use App\InstitutionType;
use Auth;
use App\Photo;
use Illuminate\Support\Facades\Storage;


class InstitutionsController extends Controller
{
    public function index()
    {
        $institutions = Institution::all();
        $institutionTypes = InstitutionType::all();

        return view('admin.institutions.index', compact('institutions',  'institutionTypes'));
    }

    public function getInstitutions(Request $request)
    {
        $query = Institution::query();

        if ($request->has('types')) {
            $query = $query->whereIn('institution_type', $request->types);
        }

        $institutions = $query->get();

        return response()->json([
            'institutions' => $institutions
        ]);
    }

    public function update(Request $request, Institution $institution)
    {
        $institution->update($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function changeStatus(Institution $institution)
    {
        $institution->status = !$institution->status;
        $institution->save();

        return response()->json([
            'status' => 'success',                
            'institution' => $institution
        ]);
    }

    public function store(Request $request)
    {
        $icons = [];
        $disk   ='public';

        // dd($request->all());
        $request->merge([
            'ratio' => $request->females / max(0.000001, ($request->females + $request->males)) * 100
        ]);

        $photoFiles = $request->file('photos');
    
        $request = $request->except(['males', 'females', 'submit', 'photos']);
        $institution = Institution::create($request);

        // dd($photoFiles);
        if( $photoFiles ) {
            foreach($photoFiles as $photo) {
                // dd($photo);
                // $photo = $request->file($photo);
            
                $file_content = file_get_contents($photo);
                $filename = md5(uniqid('', true)).'.'.$photo->extension();

                Storage::disk($disk)->put(config('paths.institution_photos') . $filename, $file_content);

                $photo = [
                    // 'name'  => $request->marker_name,
                    'path'  => '/storage/' . config('paths.institution_photos') . $filename,
                    'institution_id' => $institution->id
                ];

                $newPhoto = Photo::create($photo);

            }
        } else {
            $photo = Photo::create(['path' => '/images/default_institution.jpg',
                'institution_id' => $institution->id]);    
        }

        return redirect('/');
        // return response()->json([
        //     'status' => 'success',
        //     'institution' => $institution
        // ]);
    }

    public function delete(Institution $institution)
    {
        $institution->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function rate(Request $request, Institution $institution)
    {
        if (Auth::user()) {
            $rating = Auth::user()->ratings()->where('institution_id', $institution->id)->first();

            if ($rating) {
                $rating->update([
                    'rating' => $request->rating
                ]);

                $institution->rating = $institution->computeRating();

                return response()->json([
                    'status' => 'success',
                    'institution' => $institution->load('photos')
                ]);
            }
        }

        InstitutionRating::create([
            'user_id' => Auth::id(),
            'institution_id' => $institution->id,
            'rating' => $request->rating
        ]);

        $institution->rating = $institution->computeRating();        

        return response()->json([
            'status' => 'success',
            'institution' => $institution->load('photos')
        ]);
    }
}
