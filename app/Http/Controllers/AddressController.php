<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\posts;

use App\categorys;

use App\User;

use App\address;

use Auth;

use Session;
class AddressController extends Controller
{
    public function index(){
    	$addr = address::first();
    	return view('address.index')->withAddr($addr);
    }
    public function update(Request $request, $id)

    {

                $cat = address::find($id);

                $cat->address = $request->content;

                $cat->save();




        Session::flash('success',"Address Successfully Updated");



        return redirect()->route('address.index');

    }
}
