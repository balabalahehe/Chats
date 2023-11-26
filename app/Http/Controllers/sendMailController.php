<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sendMailController extends Controller
{
    public function viewConfirmed()
    {
        return view('sendMails.Confirmed');
    }
    // public function Confirmed(Request $request)
    // {
    //     $data = $request->all();
    //     return $this.viewConfirmed;
    // }
}
