<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function product() {

    	 return view('admin/product');
	}

    public function insert() {

    	 return view('admin/insert');
	}

    public function edit() {

    	 return view('admin/edit');
	}

    public function delete() {

    	 return view('admin/delete');
	}
}
