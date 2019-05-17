<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    // public function __invoke($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    // }
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index()
    {
        $about = \App\Contents::find(1);
        return view('about',['about'=>$about->content]);
    }
}