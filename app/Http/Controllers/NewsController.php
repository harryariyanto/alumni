<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
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
        $rows = \App\News::all();

        return view('news')->with("rows", $rows);
    }

    public function createView(Request $request)
    {
        if (Auth::check()) {
            $status = $request->user()->status;
            if ($status == 3) {
                return view('admin/createNews');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('login');
        }
    }

    public function createNews(Request $request)
    {
        $news = new \App\News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');

        $this->validate($request, ['image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $news_id = \App\news::latest()->first()->id_news + 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = "news-" . $news_id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image/news/');
            $image->move($destinationPath, $imageName);
            $news->img_url = $imageName;
        } else {
            $news->img_url = "none";
        }
        $news->status = 1;
        // $news->id_user=Auth::user()->id;
        $news->id_user = Auth::id();
        $news->save();
        $success = true;
        return view('admin/updateNews', ["news" => $news, "success" => $success]);

        // return redirect("/admin/news");
    }

    public function updateNewsPut(Request $request)
    {
        $id = $request->input('id');
        $news = \App\News::find($id);

        $news->title = $request->input('title');
        $news->content = $request->input('content');

        if ($request->hasFile('image')) {
            if ($news->img_url != 'none') {
                if (file_exists(public_path('/image/news/') . $news->img_url)) {
                    unlink(public_path('/image/news/') . $news->img_url);
                }
            }
            $image = $request->file('image');
            $imageName = "news-" . $news->id_news . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image/news/');
            $image->move($destinationPath, $imageName);
            $news->img_url = $imageName;
        }
        $news->id_user = Auth::id();
        $news->save();
        $success = true;
        return redirect('admin/news/');
        // return redirect("/admin/updateNews/".$id);
    }

    public function deleteNews(Request $request)
    {
        $news = \App\News::find($request->input('id'));
        $news->status = 0;
        $news->save();

        return redirect("/admin/news");
    }

    public function view($id)
    {
        $row = \App\News::find($id);
        if ($row) {
            $comments = \App\NewsComments::where("id_news", $id)->get();
            $users = \App\User::all();
            $commentPair = array();

            foreach ($comments as $comment) {
                foreach ($users as $user) {
                    if ($comment->id_user == $user->id) {
                        $pair = array($user, $comment);
                        $commentPair[] = $pair;
                    }
                }
            }
            if ($row->status == 0) {
                return redirect('404');
            } else {
                return view('news-detail', ["row" => $row, "comments" => $commentPair]);
            }
        }else return redirect('404');

    }
    public function updateNewsView(Request $request, $id)
    {
        if (Auth::check()) {
            $status = $request->user()->status;
            if ($status == 3) {
                $news = \App\News::find($id);
                return view('admin/updateNews')->with("news", $news);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('login');
        }
    }
    public function createComment(Request $request)
    {
        $comment = new \App\NewsComments;
        $comment->content = $request->input('comment');
        $comment->id_news = $request->input('id_news');
        $comment->id_user = Auth::id();
        $comment->status = 1;
        $comment->save();
        return redirect('news/' . $comment->id_news);
    }
    public function deleteComment($id)
    {
        $comment = \App\NewsComments::find($id);
        $newsId = $comment->id_news;
        $comment->delete();
        return redirect('news/' . $newsId);
    }

}
