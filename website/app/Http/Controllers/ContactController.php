<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

      static function sendEmail(Request $request)
      {
          $data = $request->validate([
                  'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

          Mail::to('admin@ehb.be')->send(new Email($data));

          return redirect('contact')->with('message', 'Thank you for getting in touch, we have succesfully received your message.');
      }
}
