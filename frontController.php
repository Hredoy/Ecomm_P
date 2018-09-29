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

use Calendar;
use Carbon;

use DB;

class frontController extends Controller

{

    public function index(){

		 		$shironams = categorys::with(['posts' => function($q){

		        $q->orderBy('id', 'DESC')->take(10);

		        }])->where('id',41)->first();



		        $shironam = array();

		        foreach($shironams->posts as $braking_n){

		            array_push($shironam, $braking_n);



		        }

        

         $national_f_a = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',1)->first();



        $national_f = array();

        foreach($national_f_a->posts as $braking_n){

            array_push($national_f, $braking_n);



        }



        $national = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',1)->first();

        

        $national_1 = array();

        foreach($national->posts as $braking_n){

            array_push($national_1, $braking_n);



        }



        $pol_f_a = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',2)->first();

        

        $pol_f = array();

        foreach($pol_f_a->posts as $braking_n){

            array_push($pol_f, $braking_n);



        }



        $pol = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',2)->first();

        

        $pol_1 = array();

        foreach($pol->posts as $braking_n){

            array_push($pol_1, $braking_n);



        }



       $nogor_f_a = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',23)->first();

        

        $nogor_f = array();

        foreach($nogor_f_a->posts as $braking_n){

            array_push($nogor_f, $braking_n);



        }





        $nogor = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',23)->first();

        

        $nogor_1 = array();

        foreach($nogor->posts as $braking_n){

            array_push($nogor_1, $braking_n);



        }

        $protibesh_f_a = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',13)->first();

        

        $protibesh_f = array();

        foreach($protibesh_f_a->posts as $braking_n){

            array_push($protibesh_f, $braking_n);



        }

        $protibesh = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',13)->first();

        

        $protibesh_a = array();

        foreach($protibesh->posts as $braking_n){

            array_push($protibesh_a, $braking_n);



        }



 		//

 		 $bangla_f_a = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',24)->first();

        

        $bangla_f = array();

        foreach($bangla_f_a->posts as $braking_n){

            array_push($bangla_f, $braking_n);



        }

        $bangla = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',24)->first();

        

        $bangla_a = array();

        foreach($bangla->posts as $braking_n){

            array_push($bangla_a, $braking_n);



        }

        //

 		 $orthoniti_f_a = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',4)->first();

        

        $orthoniti_f = array();

        foreach($orthoniti_f_a->posts as $braking_n){

            array_push($orthoniti_f, $braking_n);



        }



        $orthoniti = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',4)->first();

        $orthoniti_a = array();

        foreach($orthoniti->posts as $braking_n){

            array_push($orthoniti_a, $braking_n);



        }

        //

 		 $projukti_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',34)->first();

        

        $projukti_f_a = array();

        foreach($projukti_f->posts as $braking_n){

            array_push($projukti_f_a, $braking_n);



        }



        $projukti = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',34)->first();

        $projukti_a = array();

        foreach($projukti->posts as $braking_n){

            array_push($projukti_a, $braking_n);



        }

        //

 		 $porjoton_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',35)->first();

        

        $porjoton_f_a = array();

        foreach($porjoton_f->posts as $braking_n){

            array_push($porjoton_f_a, $braking_n);



        }



        $porjoton = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',35)->first();

        $porjoton_a = array();

        foreach($porjoton->posts as $braking_n){

            array_push($porjoton_a, $braking_n);



        }

         //

 		 $law_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',38)->first();

        

        $law_f_a = array();

        foreach($law_f->posts as $braking_n){

            array_push($law_f_a, $braking_n);



        }



        $law = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',38)->first();

        $law_a = array();

        foreach($law->posts as $braking_n){

            array_push($law_a, $braking_n);



        }

        //

        $campus_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',20)->first();

        

        $campus_f_a = array();

        foreach($campus_f->posts as $braking_n){

            array_push($campus_f_a, $braking_n);



        }



        $campus = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',20)->first();

        $campus_a = array();

        foreach($campus->posts as $braking_n){

            array_push($campus_a, $braking_n);



        }

        //

        $amader_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',14)->first();

        

        $amader_f_a = array();

        foreach($amader_f->posts as $braking_n){

            array_push($amader_f_a, $braking_n);



        }



        $amader = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',14)->first();

        $amader_a = array();

        foreach($amader->posts as $braking_n){

            array_push($amader_a, $braking_n);



        }

        //

        $life_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',21)->first();

        

        $life_f_a = array();

        foreach($life_f->posts as $braking_n){

            array_push($life_f_a, $braking_n);



        }



        $life = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',21)->first();

        $life_a = array();

        foreach($life->posts as $braking_n){

            array_push($life_a, $braking_n);



        }



        //

        $sport_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',33)->first();

        

        $sport_f_a = array();

        foreach($sport_f->posts as $braking_n){

            array_push($sport_f_a, $braking_n);



        }



        $sport = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',33)->first();

        $sport_a = array();

        foreach($sport->posts as $braking_n){

            array_push($sport_a, $braking_n);



        }



        //

        $binodon_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',33)->first();

        

        $binodon_f_a = array();

        foreach($binodon_f->posts as $braking_n){

            array_push($binodon_f_a, $braking_n);



        }



        $binodon = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',33)->first();

        $binodon_a = array();

        foreach($binodon->posts as $braking_n){

            array_push($binodon_a, $braking_n);



        }



         //

        $features_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',5)->first();

        

        $features_f_a = array();

        foreach($features_f->posts as $braking_n){

            array_push($features_f_a, $braking_n);



        }



        $features = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',5)->first();

        $features_a = array();

        foreach($features->posts as $braking_n){

            array_push($features_a, $braking_n);



        }

         //

        $prokashokerk_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',15)->first();

        

        $prokashokerk_f_a = array();

        foreach($prokashokerk_f->posts as $braking_n){

            array_push($prokashokerk_f_a, $braking_n);



        }



        $prokashokerk = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',15)->first();

        $prokashokerk_a = array();

        foreach($prokashokerk->posts as $braking_n){

            array_push($prokashokerk_a, $braking_n);



        }

         //

        $islam_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',39)->first();

        

        $islam_f_a = array();

        foreach($islam_f->posts as $braking_n){

            array_push($islam_f_a, $braking_n);



        }



        $islam = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',39)->first();

        $islam_a = array();

        foreach($islam->posts as $braking_n){

            array_push($islam_a, $braking_n);



        }

         //

        $islam_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',39)->first();

        

        $islam_f_a = array();

        foreach($islam_f->posts as $braking_n){

            array_push($islam_f_a, $braking_n);



        }



        $islam = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',39)->first();

        $islam_a = array();

        foreach($islam->posts as $braking_n){

            array_push($islam_a, $braking_n);



        }

         //

        $chittagong_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',27)->first();

        

        $chittagong_f_a = array();

        foreach($chittagong_f->posts as $braking_n){

            array_push($chittagong_f_a, $braking_n);



        }



        $chittagong = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',27)->first();

        $chittagong_a = array();

        foreach($chittagong->posts as $braking_n){

            array_push($chittagong_a, $braking_n);



        }

         //

        $dhaka_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',17)->first();

        

        $dhaka_f_a = array();

        foreach($dhaka_f->posts as $braking_n){

            array_push($dhaka_f_a, $braking_n);



        }



        $dhaka = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',17)->first();

        $dhaka_a = array();

        foreach($dhaka->posts as $braking_n){

            array_push($dhaka_a, $braking_n);



        }

         //

        $barisal_f = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(1);

        }])->where('id',26)->first();

        

        $barisal_f_a = array();

        foreach($barisal_f->posts as $braking_n){

            array_push($barisal_f_a, $braking_n);



        }



        $barisal = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->skip(1)->take(5);

        }])->where('id',26)->first();

        $barisal_a = array();

        foreach($barisal->posts as $braking_n){

            array_push($barisal_a, $braking_n);



        }

        $prodhan = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(5);

        }])->where('id',42)->first();

        $prodhan_a = array();

        foreach($prodhan->posts as $braking_n){

            array_push($prodhan_a, $braking_n);



        }

        $shirsho = categorys::with(['posts' => function($q){

        $q->orderBy('id', 'DESC')->take(6);

        }])->where('id',37)->first();

        $shirsho_a = array();

        foreach($shirsho->posts as $braking_n){

            array_push($shirsho_a, $braking_n);



        }



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
$events = posts::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->title,
                true,
                new \DateTime($event->created_at),
                new \DateTime($event->created_at.' +1 day'),
                null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => strtotime($event->created_at),
                    ]
            );
        
        }
        $calendar_details = Calendar::addEvents($event_list); 
            

    $recent = posts::orderBy('id','desc')->take(80)->get();
    $cat = categorys::all();

    return view('indexF.index')->withCat($cat)->withNfeature($national_f)->withNall($national_1)->withPol_a($pol_1)->withPolF($pol_f)->withProtibesh_a($protibesh_a)->withProtibesh_f($protibesh_f)->withNogor_a($nogor_1)->withNogor_f($nogor_f)->withBangla_a($bangla_a)->withBangla_f($bangla_f)->withOrthoniti_f($orthoniti_f)->withOrthoniti_a($orthoniti_a)->withProjukti_f($projukti_f_a)->withProjukti_a($projukti_a)->withPorjoton_f($projukti_f_a)->withPorjoton_a($projukti_a)->withLaw_f($law_f_a)->withLaw_a($law_a)->withCampus_f($campus_f_a)->withCampus_a($campus_a)->withAmader_f($amader_f_a)->withAmader_a($amader_a)->withLife_f($life_f_a)->withLife_a($life_a)->withSport_f($sport_f_a)->withSport_a($sport_a)->withBinodon_f($binodon_f_a)->withBinodon_a($binodon_a)->withFeatures_f($features_f_a)->withFeature_a($features_a)->withProkashok_f($prokashokerk_f_a)->withProkashok_a($prokashokerk_a)->withIslam_f($islam_f_a)->withIslam_a($islam_a)->withChittagong_f($chittagong_f_a)->withChittagong_a($chittagong_a)->withDhaka_f($dhaka_f_a)->withDhaka_a($dhaka_a)->withBarisal_f($barisal_f_a)->withBarisal_a($barisal_a)->withShironam($shironam)->withRecent($recent)->withProdhan($prodhan_a)->withShirsho($shirsho_a)->withAd($ads)->withAd1($ads1)->withAd2($ads2)->withAd3($ads3)->withAd4($ads4)->withAd5($ads5)->withAd6($ads6)->withAd7($ads7)->withAd8($ads8)->withAd9($ads9)->withAd10($ads10)->withAd11($ads11)->withAd12($ads12)->withAd13($ads13)->withAd14($ads14)->withAd15($ads15)->withAd16($ads16)->withAd17($ads17)->withAd18($ads18)->withAd19($ads19)->withPost($calendar_details); 	

    }
    public function dates( $category){
         $cat = categorys::all();
        $recent = posts::orderBy('id','desc')->take(80)->get();
        $braking_news = categorys::with(['posts' => function($q){
        $q->orderBy('id', 'DESC')->take(5);
        }])->where('id',37)->first();
        $id = $category;
        $braking_n_1 = array();
        foreach($braking_news->posts as $braking_n){
            array_push($braking_n_1, $braking_n);

        }
       $date = date('Y-m-d', $category);
        $posts = posts::all()->where('created_at',$date)->groupBy('created_at');
       

        dd($posts);
    }

    

}

