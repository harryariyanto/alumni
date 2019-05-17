<?php

namespace App\Http\Controllers;

use App\User;
use App\Alumni;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;

class AdminController extends Controller
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
       ;
    }

    public function index(Request $request)
    {
        if (Auth::check()){
            $status = $request->user()->status;
            if ($status == 3){
                $about=\App\Contents::find(1);
                $alumnis = \App\User::where('year','>', 1989)->where('status',1);
                $teachers = \App\User::where('year',0)->where('status',1);
                $news = \App\News::all()->where('status',1);
                $discussions = \App\Discussions::all()->where('status',1);
                return view('admin.index',
                ['about' => $about,
                'alumnis'=>$alumnis,
                'teachers'=>$teachers,
                'news'=>$news,
                'discussions'=>$discussions]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('login');
        }
    }

    public function member(Request $request)
    {
        if (Auth::check()){
            $status = $request->user()->status;
            if ($status == 3){
                $memberNeedApproval = \App\User::where('status',2)->get();
                $memberList = \App\User::all();
                $dataset = Alumni::all();
                return view('admin.memberList',['memberNeedApproval' => $memberNeedApproval,'memberList' => $memberList, 'dataset' => $dataset]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('login');
        }
    }

    public function updateAbout(Request $request)
    {
        if (Auth::check()){
            $status = $request->user()->status;
            if ($status == 3){
                $about=\App\Contents::find(1);
                $about->content=$request->input('editordata');
                $about->save();
                return redirect('admin');
            }
                else
                return redirect('/');
            }
            else return redirect('login');  

    }
    


    public function updateUserStatus(Request $request,$id)
    {
        if (Auth::check()){
            $status = $request->user()->status;
            if ($status == 3){
                $stat=$request->btnSubmit;
                $user = \App\User::find($id);
                $user->status=$stat;
                $user->save();
               // Log::info('This is some useful information.');
               return redirect('admin/member');
            }
                else
                return redirect('/');
            }
            else return redirect('login');

    }
    public function updateNewsStatus(Request $request)
    {
        if (Auth::check()){
            $status = $request->user()->status;
            if ($status == 3){
                $stat=$request->btnSubmit;
                $id=$request->id;
                $news = \App\News::find($id);
                $news->status=$stat;
                $news->save();
               // Log::info('This is some useful information.');
               return redirect('admin/news');
            }
                else
                return redirect('/');
            }
            else return redirect('login');

    }

        public function detailUser(Request $request,$id)
        {
            if (Auth::check()){
                $status = $request->user()->status;
                if ($status == 3){$user = \App\User::find($id);
                    // Log::info('This is some useful information.');
                    return view('admin.detailUser')->with('user',$user);}
                    else
                    return redirect('/');
                }
                else return redirect('login');
            
        }

        public function createUser(Request $request)
        {
            if (Auth::check()){
                $status = $request->user()->status;
                if ($status == 3){            
                    return view('admin.createUser');
                }
                    else
                    return redirect('/');
                }
                else return redirect('login');

        }
        public function postUser(Request $request)
        {
            if (Auth::check()){
                $status = $request->user()->status;
                if ($status == 3){
                    // by default, teacher passowrd will be 123456
            $user= new \App\User;
            $user->first_name=$request['first_name'];
            $user->last_name=$request['last_name'];
            $user->year=0;
            $user->link="https://www.linkedin.com/";
            $user->email=$request['email'];
            $user->password=bcrypt(123456);
            $user->status=1;
            $user->save();
            return redirect('admin/member');
                }
                    else
                    return redirect('/');
                }
                else return redirect('login');
            
        }   

        public function showAllNews(Request $request)
        {
            
            if (Auth::check()){
                $status = $request->user()->status;
                if ($status == 3){
                    $news = \App\News::all();
                    return view('admin.newsList',['news'=>$news]);
                } else {
                    return redirect('/');
                } 
            } else {
                return redirect('login');
            }
        }
        
        public function upload_excel(Request $request){
            if (Auth::check()){
                $status = $request->user()->status;
                if ($status == 3){
                    if ($request->hasFile('excel')){
                        $path = $request->file('excel')->getRealPath();
                        $data = Excel::load($path, function($reader){})->get();
                            if (!empty($data) && $data->count()){
                                Alumni::truncate();
                                foreach($data as $key => $value){
                                    $row = new Alumni();
                                    $row->front_name = $value->front_name;
                                    $row->last_name = $value->last_name;
                                    $row->birth_date = $value->birth_date;
                                    $row->grad_year = $value->grad_year;
                                    $row->save();
                                }
                            }
                        return redirect('admin/member');
                    }
                } else {
                    return redirect('/');
                } 
            } else {
                return redirect('login');
            }
        }

        public function download_excel(Request $request){
	        if (Auth::check()){
                $status = $request->user()->status;
                if ($status == 3){
                    $alumni_data = Alumni::all();
			        $alumni_array[] = array('front_name', 'last_name', 'birth_date', 'grad_year');
			        foreach($alumni_data as $data){
			            $alumni_array[]= array(
			                'front_name' => $data->front_name,
			                'last_name'=>$data->last_name,
			                'birth_date'=>$data->birth_date,
			                'grad_year'=>$data->grad_year
			            );
			        }  
			        Excel::create('Alumni Data ',function($excel) use ($alumni_array){
			            $excel->setTitle('Alumni Data');
			            $excel->sheet('Alumni Data',function($sheet) use ($alumni_array){
			                $sheet->fromArray($alumni_array,null,'A1',false,false);
			            });
			        })->download('xlsx');
                } else {
                    return redirect('/');
                } 
            } else {
                return redirect('login');
            }
        }
    }