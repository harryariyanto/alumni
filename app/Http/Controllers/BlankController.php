<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class BlankController extends Controller
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
        return view('admin.login');
    }
}