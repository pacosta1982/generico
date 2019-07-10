<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home',compact(''));
        //alert()->success('You have been logged out.', 'Good bye!');
        Alert::alert('Title', 'Message', 'Type');
        alert('Title','Lorem Lorem Lorem', 'success');

        //toast('Your Post as been submited!','success');
        return view('home');

        //return Redirect::home();
    }
}
