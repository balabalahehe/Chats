<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jobs\sendMail;    
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\client\themTaiKhoanRequest;
use App\User;

class UserController extends Controller
{
    public function register(themTaiKhoanRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        // $data['hash'] = (string) Str::uuid();
        $hash = (string) Str::uuid();
        $data['hash'] = $hash;
        toastr()->success('You have successfully registered !');

        $details['fullname'] = $data['fullname'];
        // $details['content'] = 'Hi !';
        $details['hash'] = $hash;

        // sendMail::dispatch($data['email'], 'mails.activeMail', $details, 'Xác Minh Tài Khoản');

        $mailjob = new sendMail($data['email'], 'sendMails.confirmMail', $details, 'Confirm Your Account.');
        dispatch($mailjob);

        User::create($data);

        return redirect('/');
    }
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        $user = Auth::guard('user')->attempt($data);
        if($user){
            $user = Auth::guard('user')->user();
            if($user->is_verifymail == 0){
                dd('Your email has not been confirmed !');
            } else {
                return redirect()->route('viewChat');
            }
        } else {
            dd('Email or password is incorrect. Please try again !');
        }
    }
    public function confirm($hash)
    {
        $user = User::where('hash',$hash)->first();
        if($user){
            if($user->is_verifymail == 0){
                $user->is_verifymail = 1;
                $user->save(); 
                // echo 'oke !';
                return redirect()->route('confirmed');
            } else {
                echo 'This account has activated !'; 
            }
        } else {
            echo 'Fail, Try again. Please !';
        }
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        echo 'Logout successfully !';
        return redirect('/');
    }
    
}
