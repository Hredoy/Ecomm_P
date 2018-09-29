<?php



namespace App\Http\Controllers;

ini_set('max_execution_time', 300);

use Illuminate\Http\Request;

use App\posts;

use App\categorys;

use App\Ads;

use URL;

use Auth;
use Validator;
use App\Event;
use App\Youtubelink;
use App\address;

use Calendar;
use Carbon;

use DB;

class frontController extends Controller

{

    public function index(){
    $post = posts::orderBy('id','DESC')->paginate(20);
    $categorys = categorys::all();

    return view('indexF.index')->withCat($categorys)->withPost($post); 	

    }
    public function  dates(Request $request){
        $cat = categorys::all();
        $recent = posts::orderBy('id','desc')->take(80)->get();
        $shironams = categorys::with(['posts' => function($q){

                $q->orderBy('id', 'DESC')->take(10);

                }])->where('id',41)->first();



                $shironam = array();

                foreach($shironams->posts as $braking_n){

                    array_push($shironam, $braking_n);



                }
        
         $address = address::first();

        $date = $request->created_at;
        $date = date('Y-m-d', $date);
        $post = posts::search($date)->orderBy('id','desc')->paginate(5);
         return view('indexF.archive')->withRecent($recent)->withCat($cat)->withCatpos($post)->withAddr($address)->withShironam($shironam);
    }
    

}

