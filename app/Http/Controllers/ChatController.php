<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ChatController extends Controller
{
   public function index()
   {
       $user = Auth::guard('user')->user();
       if($user){
        $data = Chat::all();
        return view('Chats.chat', compact('user', 'data'));
       } else {
           echo 'You are not login !'; 
       }
   }
   public function createChat(Request $request)
   {
    $user = Auth::guard('user')->user();
    $content = $request->content;
    if(Str::length($content) > 0 && $user){
        $chat = Chat::create([
            'user_id' => $user->id,
            'content' => $content,
        ]);

        return response()->json(['chat' => $chat]);
        }
   }
   public function load()
   { 
        $data = [];
        $now = Carbon::now()->subSeconds(1);
        $user = Auth::guard('user')->user();
        if($user){
            $data = Chat::where('user_id', '<>', $user->id)
                        ->where('created_at', '>=' , $now)
                        ->get();
        }
        return response()->json(['data' => $data]);
    }
    // public function views()
    // {
    //     return view('Chats.loginRegister');
    // }
}
