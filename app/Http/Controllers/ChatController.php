<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Chat;
use App\like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function getDashboard(){
    	$posts = Chat::orderBy('created_at', 'desc')->get();
    	return view('dashboard', ['posts' => $posts]); 
    }
    public function postCreatePost(Requests $request){
    	$this->validate($request,
    		[
    		 'body' => 'required|max:1000'
    		]);
    	$post = new Chat();
    	$post->body = $request['body'];
    	$message = 'There was an error';
    	if ($request->user()->chats()->save($post)){
    		$message = 'Message send successfully';
    	}
    	return redirect()->route('dashboard')->with(['message' => $message]);
    }
}
