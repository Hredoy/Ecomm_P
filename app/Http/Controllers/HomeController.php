<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\categorys;
use App\posts;
use App\Ads;

use DB;

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        return view('admin');

    }
    public function facebook()

    {
$cat = categorys::all();
        $recent = posts::orderBy('id','desc')->take(80)->get();
        $braking_news = categorys::with(['posts' => function($q){
        $q->orderBy('id', 'DESC')->take(5);
        }])->where('id',37)->first();
        
        $braking_n_1 = array();
        foreach($braking_news->posts as $braking_n){
            array_push($braking_n_1, $braking_n);

        }
        $ads10 = Ads::where('id',11)->get();
            $ads11 = Ads::where('id',12)->get();
            $ads12 = Ads::where('id',13)->get();
            $ads13 = Ads::where('id',14)->get();
            $ads14 = Ads::where('id',15)->get();
            $ads15 = Ads::where('id',16)->get();
            $ads16 = Ads::where('id',17)->get();
            $ads17 = Ads::where('id',18)->get();
            $ads18 = Ads::where('id',19)->get();
            $ads19 = Ads::where('id',20)->get();
           
            $ads20 = Ads::where('id',21)->get();
            $ads21 = Ads::where('id',22)->get();
            $ads22 = Ads::where('id',23)->get();
            $ads23 = Ads::where('id',24)->get();
            $ads24 = Ads::where('id',25)->get();

        return view('admin')->withRecent($recent)->withCat($cat)->withBreaking($braking_n_1)->withCatname($id)->withAd10($ads10)->withAd11($ads11)->withAd12($ads12)->withAd13($ads13)->withAd14($ads14)->withAd15($ads15)->withAd16($ads16)->withAd17($ads17)->withAd18($ads18)->withAd19($ads19)->withAd20($ads20)->withAd21($ads21)->withAd22($ads22)->withAd23($ads23)->withAd24($ads24);

    }

}

