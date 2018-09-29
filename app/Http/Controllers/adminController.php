<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\posts;

use App\categorys;

use App\User;

use Auth;

class adminController extends Controller

{

    public function index(){

    	$userss = User::find(Auth::id());

        

        if(Auth::guest())

			{

			    return redirect()->route('login');

			}else{

				if($userss->hasRole('superadministrator')){

		            return view('admin');

		           }else{

		           	return redirect()->route('login');

		        }

			}



    }

}

