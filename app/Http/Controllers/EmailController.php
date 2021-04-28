<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([

            'email' => 'required|email|unique:emails',

        ]);

        $email=Email::create([

            'email' => $request->email,

        ]);
        if($email==false){
            return redirect()->back()->with('error', 'Incorrect email');
        }

        session()->flash('success', 'We received your email, thank you');
        return redirect()->home();



    }
}
