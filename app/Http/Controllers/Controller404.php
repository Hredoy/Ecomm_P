<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\wp_terms;
use App\wp_posts;
use Image;
use URL;
use Auth;
class controller404 extends Controller
{
	public function error404(){
		return view('error');
	}
}