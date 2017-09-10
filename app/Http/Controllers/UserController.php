<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function product() {

    	 return view('user/product');
	}

    public function insert() {

    	 return view('user/insert');
	}

    public function edit() {

    	 return view('user/edit');
	}

    public function delete() {

    	 return view('user/delete');
	}
}
