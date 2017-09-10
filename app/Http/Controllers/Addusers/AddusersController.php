<?php

namespace App\Http\Controllers\Addusers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adduser;

class AddusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $products = Product::all();
        // return view('admin.product')->with('products',$products);

            $NUM_PAGE = 10;
            $addusers = Adduser::paginate($NUM_PAGE);
            $page = $request->input('page');
            $page = ($page != null)?$page:1;
            return view('adduser')->with('addusers',$addusers)
                                        ->with('page',$page)
                                        ->with('NUM_PAGE',$NUM_PAGE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fill_in');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Adduser::create( $request->all());
        return redirect('addusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adduser = Adduser::findOrFail($id);
        return view('adduser')->with('adduser',$adduser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adduser = Adduser::findOrFail($id);
        return view('edit')->with('adduser',$adduser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adduser = Adduser::findOrFail($id);
        $adduser->update($request->all());
        return redirect('addusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adduser::destroy($id);
        return redirect('addusers');
    }

}
