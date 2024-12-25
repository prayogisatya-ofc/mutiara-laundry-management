<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }

    public function contact(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        return redirect()->to('https://wa.me/6282184565357?&text=Nama%20%3A%20' . $name . '%0AEmail%20%3A%20' . $email . '%0AJudul%20%3A%20' . $subject . '%0APesan%20%3A%20' . $message);
    }
}
