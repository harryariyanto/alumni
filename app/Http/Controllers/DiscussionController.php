<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
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
        if (Auth::Check()) {
            $discussion = DB::table('discussions')
                ->select('discussions.*','users.first_name','users.last_name','users.img_url')
                ->where('discussions.status', 1)
                ->orderBy('id_discussions', 'desc')
                ->join('users', 'discussions.id_user', '=', 'users.id')
                ->get();
            //$discussion = \App\Discussions::all()
            //                    ->where('status',1)
            //                    ->sortByDesc('id_discussions');
            return view('discussion', ['discussions' => $discussion]);
        } else {
            return redirect('/');
        }
    }

    public function view($id){
      $discussion = DB::table('discussions')
                    ->select('discussions.*','users.first_name','users.last_name','users.img_url')
                    ->where('discussions.id_discussions',$id)
                    ->leftJoin('users', 'discussions.id_user', '=', 'users.id')
                    ->first();
      $row = DB::table('discussionscomments')
            ->select('discussionscomments.*','users.first_name','users.last_name','users.img_url')
            ->where('id_discussion',$id)
            ->where('discussionscomments.status',1)
            ->join('users', 'discussionscomments.id_user', '=', 'users.id')
            ->get();

      if ($discussion == null || $discussion->status == 0) {
        return view('404');
      } else {
        return view('discussion-detail',['discussion'=> $discussion, 'row'=> $row]);
      }
    }

    public function create(Request $request)
    {
        $discussion = new \App\Discussions;

        $discussion->title = $request->input('title');
        $discussion->content = $request->input('content');
        $discussion->status = 1;
        $discussion->id_user = Auth::user()->id;
        //$discussion->id_user = 1;

        $discussion->save();

        return redirect("/discussions");

    }

    public function createComment($id, Request $request){
      $discomment = new \App\DiscussionsComments;

      $discomment->content=$request->input('content');
      $discomment->status = 1 ;
      $discomment->id_discussion = $id;
      $discomment->id_user = Auth::user()->id;
      $discomment->save();
      return redirect("/discussions/".$id);
    }

    public function delete(Request $request)
    {
        $discussion = \App\Discussions::find($request->input('id'));
        $discussion->status = 0;
        $discussion->save();
        return redirect("/discussions");
    }

    public function deleteComment(Request $request){
      $id=$request->input('id');
      $discussion=\App\DiscussionsComments::find($request->input('comment_id'));
      $discussion->status=0;
      $discussion->save();
      return redirect("/discussions/".$id);
    }
    //0 = deleted
    //1 = aktif
    //2 = closed
    public function update(Request $request)
    {

        $discussion = \App\Discussions::find($request->id);

        $discussion->status = 0;
        //$discussion->id_user = Auth::user()->id;
        $discussion->save();
    }

}
