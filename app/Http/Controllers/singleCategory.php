<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorys;
use App\posts;
use App\Ads;
use App\address;
use DB;
class singleCategory extends Controller
{
    public function index($category,$id){
        $cat = categorys::all();

        $post = posts::where('id',$id)->first();
        $cat_rel_post = categorys::with(['posts' => function($q){
        $q->orderBy('id', 'DESC')->take(10);
        }])->where('name',$category)->first();
        
        $cat_rel_post_1 = array();
        foreach($cat_rel_post->posts as $braking_n){
            array_push($cat_rel_post_1, $braking_n);

        }

        return view('indexF.single')->withCat($cat)->withCatpos($cat_rel_post_1)->withPost($post);

    }
    public function category(categorys $category){
        $cat = categorys::all();
        $recent = posts::orderBy('id','desc')->take(80)->get();
         $id = $category;
        $shironams = categorys::with(['posts' => function($q){

                $q->orderBy('id', 'DESC')->take(10);

                }])->where('id',41)->first();



                $shironam = array();

                foreach($shironams->posts as $braking_n){

                    array_push($shironam, $braking_n);



                }
        
         $address = address::first();

        $cat_rel_post =  $category->pagii();
        $posts_1 = array();
        foreach($cat_rel_post as $post){
            $cat_post_f_post = posts::where('id',$post->id)->get();
            foreach($cat_post_f_post as $braking_n){
            array_push($posts_1, $braking_n);

        }
        }

        return view('indexF.cat')->withRecent($recent)->withCat($cat)->withCatpos($posts_1)->withPostlink($cat_rel_post)->withCurrent($id)->withAddr($address)->withShironam($shironam);
    }
}
