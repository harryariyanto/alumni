<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
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
        if (Auth::id() != null){
            $res = User::where("status", 1)->orderBy('first_name')->get();
            return view('member')->with("res", $res);
        } else {
            return redirect('home');
        }
    }

    public function filterCategory(Request $request){
        if ($request->input('category') == "teacher"){
            // $res = User::where('year', 0)->where("status", 1)->orWhere("status", 3)->get();
            $res = User::where('year', 0)->where('status', 1)->orderBy('first_name')->get();
        } else if ($request->input('category') == "student"){
            $res = User::where('year', '!=', 0)->where('status', 1)->orderBy('first_name')->get();
        } else {
            $res = User::where("status", 1)->orderBy('first_name')->get();
        }
        echo $res;
    }

    public function filterYear(Request $request){
        if ($request->input("year") != "-"){
            $res = User::where('year', $request->input('year'))->where('status', 1)->orderBy('first_name')->get();
        } else {
            $res = User::where('year', '!=', 0)->where('status', 1)->orderBy('first_name')->get();
        }
        echo $res;
    }

    public function profile(Request $request)
    {
        if (Auth::id() != null){
            $row = User::where("id", Auth::id())->first();
            
            // $pass = Session::get('data');
            return view('profile')->with("row", $row);
        } else {
            return view('home');
        }
    }

    public function update_profile(Request $request)
    {
        if (Auth::id() != null){
            $row = User::where("id", Auth::id())->update(['first_name' => $request->input('first_name'), 'last_name' => $request->input('last_name'), 'email' => $request->input('email'), 'year' => $request->input('year'), 'link' => $request->input('link')]);

            $pass = "Update data successful!";
            return redirect('profile')->with( ['pass' => $pass] );
        } else {
            return redirect('home');
        }
    }

    public function change_password(Request $request)
    {
        if (Auth::id() != null){
            $row = User::where("id", Auth::id())->first();
            if (Hash::check($request->input('old_password'), $row->password)){
                if ($request->input('new_password') == $request->input('confirm_password')){
                    $row = User::where("id", Auth::id())->update(['password' => bcrypt($request->input('new_password'))]);
                    
                    $pass = "Change password successful!";
                    $request->session()->put('pass', $pass);
                    return redirect('profile');
                }
                $pass = "Confirm password fail!";
                $request->session()->put('pass', $pass);
                return redirect('profile');
            }
            $pass = "Wrong old password!";
            $request->session()->put('pass', $pass);
            return redirect('profile');
        } else {
            return redirect('home');
        }
    }

    public function upload_picture(Request $request){
        if (Auth::id() != null){
            $row = User::where("id", Auth::id())->first();
            $this->validate($request, ['picture.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

            if ($request->hasFile('picture')) {
                $image = $request->file('picture');
                $imageName = "user-" . Auth::id(). '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/image/member/');
                $image->move($destinationPath, $imageName);

                $row = User::where("id", Auth::id())->update(['img_url' => 'public/image/member/'.$imageName]);

                return redirect('profile');
            }
        } else {
            return redirect('home');
        }
    }
}