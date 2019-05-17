<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
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
        $news = \App\News::take(4)->orderBy('created_at', 'desc')->get();

        $discussions = \App\Discussions::take(3)->where('status',1)->orderBy('created_at', 'desc')->get();

        return view('index', ["news" => $news, "discussions" => $discussions]);
    }

    public function notFound()
    {
        return view("404");
    }
}