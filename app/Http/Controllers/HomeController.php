<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view("home");
        $status = $request->user()->status;

        if ($status == 1 || $status == 3 || $status == 5){
            return redirect("/");
        } else if ($status == 2){
            $request->session()->put('message', 'This member is still waiting for approval.');
            return redirect("logout");
            // return redirect("logout")->with('message', 'This member is still waiting for approval.');
            // return redirect('login')->with('success', 'This member is still waiting for approval.');

            // return redirect("login")->with("type", 0);
        } else {
            $request->session()->put('message', 'This member is not found.');
            return redirect("logout");
            // return redirect("logout")->with('message', 'This member is not found.');
            // return redirect("login")->with("type", 1);
        }
    }

    
}
