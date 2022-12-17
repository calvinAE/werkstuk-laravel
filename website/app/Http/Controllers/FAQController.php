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

    public function index()
    {
        $faq = FAQ::All();
        return view('faq.index', compact('faq'));
    }


    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new FAQ();
        $faq->user_id = Auth::user()->id;
        $faq->question = $validated['question'];
        $faq->answer = $validated['answer'];

        $faq->save();
    }
}
