<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        $allFAQ = FAQ::All();
        $category = $request->category;
        $faq = FAQ::when($category, function($query) use ($category){
            return $query->where('category', $category);
        })->get();

        return view('faq.index')->with(compact('allFAQ', 'faq'));
    }


    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'question' => 'required',
            'category' => 'required',
            'answer' => 'required',
        ]);

        $faq = new FAQ();
        $faq->user_id = Auth::user()->id;
        $faq->question = $validated['question'];
        $faq->category = $validated['category'];
        $faq->answer = $validated['answer'];

        $faq->save();
        return redirect()->route('faq.index')->with('status', 'FAQ added');
    }

    public function delete($id){

        $user = FAQ::findOrFail($id);
        $user->delete();
        return redirect()->route('faq.index')->with('status', 'FAQ removed');

    }
}
