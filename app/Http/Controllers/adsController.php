<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\wp_terms;
use App\User;
use URL;
use Auth;
class adsController extends Controller
{
    public function single_ads(){
        $user = User::find(Auth::id());

        if($user->hasRole(['superadministrator','administrator']))
        {
        	$ads = Ads::where('id',1)->get();
        	$ads1 = Ads::where('id',2)->get();
        	$ads2 = Ads::where('id',3)->get();
        	$ads3 = Ads::where('id',4)->get();
        	$ads4 = Ads::where('id',5)->get();
        	$ads5 = Ads::where('id',6)->get();
        	$ads6 = Ads::where('id',7)->get();
        	$ads7 = Ads::where('id',8)->get();
        	$ads8 = Ads::where('id',9)->get();
        	$ads9 = Ads::where('id',10)->get();
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

    	   return view('ads.single')->withAd($ads)->withAd1($ads1)->withAd2($ads2)->withAd3($ads3)->withAd4($ads4)->withAd5($ads5)->withAd6($ads6)->withAd7($ads7)->withAd8($ads8)->withAd9($ads9)->withAd10($ads10)->withAd11($ads11)->withAd12($ads12)->withAd13($ads13)->withAd14($ads14)->withAd15($ads15)->withAd16($ads16)->withAd17($ads17)->withAd18($ads18)->withAd19($ads19)->withAd20($ads20)->withAd21($ads21)->withAd22($ads22)->withAd23($ads23)->withAd24($ads24)->withAuths($user);
        }
    }
    public function manager($id){

    	$ad  = Ads::where('id',$id)->first();
    	return view('ads.manager')->withAd($ad);
    }
    public function index_ads(){
         $user = User::find(Auth::id());
    if($user->hasRole(['superadministrator','administrator','user'])){
        $ads = Ads::where('id',1)->get();
            $ads1 = Ads::where('id',2)->get();
            $ads2 = Ads::where('id',3)->get();
            $ads3 = Ads::where('id',4)->get();
            $ads4 = Ads::where('id',5)->get();
            $ads5 = Ads::where('id',6)->get();
            $ads6 = Ads::where('id',7)->get();
            $ads7 = Ads::where('id',8)->get();
            $ads8 = Ads::where('id',9)->get();
            $ads9 = Ads::where('id',10)->get();
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

        return view('ads.index')->withAd($ads)->withAd1($ads1)->withAd2($ads2)->withAd3($ads3)->withAd4($ads4)->withAd5($ads5)->withAd6($ads6)->withAd7($ads7)->withAd8($ads8)->withAd9($ads9)->withAd10($ads10)->withAd11($ads11)->withAd12($ads12)->withAd13($ads13)->withAd14($ads14)->withAd15($ads15)->withAd16($ads16)->withAd17($ads17)->withAd18($ads18)->withAd19($ads19);
        }
    }
    
    public function header_ads(){
        $user = User::find(Auth::id());
    if($user->hasRole(['superadministrator','administrator','user'])){
        $ads23 = Ads::where('id',24)->get();
        return view('ads.header')->withAd23($ads23)->withAuths($user);
        }
    }
    public function updates_manager(Request $request, $id){
    	$ads = Ads::findOrfail($id);
    	if($request->type == 0){	
    		$ads->ads = URL::to('/').$request->filepath;
    		$ads->type = $request->type;
    	}else{

    	$ads->ads = $request->code;
    	$ads->type = $request->type;
    	}
    	$ads->save();
    	return "<script>window.close()</script>";
    }
}
