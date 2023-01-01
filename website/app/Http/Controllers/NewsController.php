<?php

namespace App\Http\Controllers;

use App\Models\News;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $news = News::All();
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.detail', compact('news'));
    }


    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover_img' => 'required'
        ]);

        $news = new News;
        $news->user_id = Auth::user()->id;
        $news->title = $validated['title'];
        $news->content = $validated['content'];
        $news->cover_img = $validated['cover_img'];
        $news->publishing_date = (new DateTime());

        $news->save();
        return redirect()->route('news.index')->with('status', 'News added');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();


        return Redirect::route('news.index')->with('status', 'News has been deleted');
    }
}
