<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wp_posts;
use App\User;
use App\wp_terms;
use App\basi;
use App\Ads;
use DB;
class blogController extends Controller
{
    public function index($cat_name,$post_id,$post_title){
        $basic = basi::all()->first();


date_default_timezone_set('Asia/Dhaka');
function bn_date($str)
 {
     $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
     $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
     $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
     $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
     $str = str_replace( $en, $bn, $str );
     $str = str_replace( $en_short, $bn_short, $str );
     $en = array( 'am', 'pm' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
     return $str;
 }

///////////////// Ads 

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
///////////////////////
        $all_cat = wp_terms::with('subMenu')->where('slug',0)->get();
    	$post = wp_posts::where('post_title',$post_title)->first();

    	$post_f_img = wp_posts::select('guid','post_parent')->where([['post_parent',$post->id],['post_mime_type','image/jpeg']])->get();
    	
    	$post_r_post = wp_terms::with(['wp_posts' => function($q){
        $q->where('post_status','publish')->orderBy('id', 'DESC')->take(5);
          }])->where('cat_name',$cat_name)->first();
        $ps_1 = array();
        $ps_id= array();
        $ps_2 = array();

        $dates = array();
        $authors = array();

        $author_qr = USER::where('id',$post->post_author)->first();
        $author = $author_qr->name;
        array_push($authors, $author);
        $date = bn_date(date('l, d M Y, h:i a',strtotime($post->post_modified)));
        array_push($dates, $date);
        foreach($post_r_post->wp_posts as $pl_post){
            $pss_id = $pl_post->id;
            
            $pl_a = wp_posts::select('guid','post_parent','post_modified')->where([['post_parent',$pss_id],['post_mime_type','image/jpeg']])->take(1)->get();
            
            foreach($pl_a as $po){
                $id = $po->guid;
                $id = array_push($ps_1, $id);
                array_push($ps_id, $po->post_parent);
            }
        }
        foreach($ps_id as $ps_key => $ps_value){
            $pl_r = wp_posts::select('post_title','id','post_author')->where('id',$ps_value)->take(1)->get();
                array_push($ps_2, $pl_r);
        }
        $ps_a = array_combine($ps_1, $ps_2);
        $ps_b = array_combine($dates, $authors);


    	return view('blog.index')->withPost($post)->withCat($post_r_post)->withPost_f_img($post_f_img)->withRelated($ps_a)->withNav($all_cat)->withPs_b($ps_b)->withAd14($ads14)->withAd15($ads15)->withAd16($ads16)->withAd17($ads17)->withAd18($ads18)->withAd19($ads19)->withAd20($ads20)->withAd21($ads21)->withAd22($ads22)->withAd23($ads23)->withBasic($basic);
    }
}
