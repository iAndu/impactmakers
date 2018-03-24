<?php

<<<<<<< HEAD
/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
=======
namespace App\Http\Controllers;

use Illuminate\Http\Request;

>>>>>>> 9c5559a1a3e2ac30814f00f8b41faa23c0d04f6e
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
<<<<<<< HEAD
     * @return Response
     */
    public function index()
    {
        return view('adminlte::home');
=======
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
>>>>>>> 9c5559a1a3e2ac30814f00f8b41faa23c0d04f6e
    }
}
