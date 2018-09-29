<?php







namespace App\Http\Controllers;







use Illuminate\Http\Request;



use Session;



use App\posts;



use App\categorys;



use App\User;



use Image;



use URL;



use Auth;



class postController extends Controller



{



    /**



     * Display a listing of the resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function upSearch(Request $request){



        $userss = User::find(Auth::id());



        $this->validate($request, array(



            'pro_search' => 'required'



        ));



        $key = $request->get('pro_search');



        $category = posts::search($key)->orderBy('id','desc')->paginate(7);







        return view('admin.post.search')->withSearch($category)->withAuths($userss);



    }







    public function index()



    {



        $userss = User::find(Auth::id());



        



        if(Auth::guest())



            {



                return redirect()->route('login');



            }else{



            $post = posts::orderBy('id','DESC')->paginate(10);



            return view ('post.index')->withPost($post);



        }



      



    }







    /**



     * Show the form for creating a new resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function create()



    {



        if(Auth::guest())



            {



                return redirect()->route('login');



            }else{



            $cat = categorys::all();



            return view('post.create')->withCat($cat);







        }







    }







    /**



     * Store a newly created resource in storage.



     *



     * @param  \Illuminate\Http\Request  $request



     * @return \Illuminate\Http\Response



     */



    public function store(Request $request)



    {



            if(Auth::guest())



            {



                return redirect()->route('login');



            }else{



            $user = User::find(Auth::id());



            if($user->hasRole(['superadministrator','administrator','user'])){



                $post = new posts;



                $post->title = $request->name;



                $post->details = $request->content;

                $post->price = $request->price;
                $post->materials = $request->materials;
                $post->color = $request->color;

                 if(empty($request->featured)){



                    $post->featured = '';



                }else{



                $post->featured = URL::to('/').$request->featured;



                }




               $post->size = implode(',', $request->size);

                $post->save();



                Session::flash('success', 'This post was successfully added.');



                $post->users()->sync($user, false);



                $post->categorys()->sync($request->cat_id, false);



                return redirect()->route('post.show',$post->id);



                



            }



        }



        



    }











    /**



     * Display the specified resource.



     *



     * @param  int  $id



     * @return \Illuminate\Http\Response



     */



    public function show($id)



    {



         if(Auth::guest())



            {



                return redirect()->route('login');



            }else{



        $post = posts::find($id);



        return view('post.show')->withPost($post);



    }



    }







    /**



     * Show the form for editing the specified resource.



     *



     * @param  int  $id



     * @return \Illuminate\Http\Response



     */



   public function edit($id)

    {

        if(Auth::guest())

            {

                return redirect()->route('login');

            }else{

        $post = posts::find($id);
        $cat = categorys::all();
        return view('post.edit')->withPost($post)->withCat($cat);

    }

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

        if(Auth::guest())

            {

                return redirect()->route('login');

            }else{

            $user = User::find(Auth::id());

            if($user->hasRole(['superadministrator','administrator','user'])){

                $post = posts::find($id);

                $post->title = $request->name;

                $post->details = $request->content;

                 if(empty($request->featured)){

                    $post->featured = 'http://www.swopnokotha.news/img/logo.png';

                }else{

                $post->featured = URL::to('/').$request->featured;

                }



                $post->save();

                Session::flash('success', 'This post was successfully added.');

                $post->users()->sync($user);

                $post->categorys()->sync($request->cat_id);

                return redirect()->route('post.show',$post->id);

                

            }

        }


    }

    



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function destroy($id)



    {

        $user = User::find(Auth::id());

        if($user->hasRole(['superadministrator','administrator'])){

            $post = posts::find($id);

        $post->categorys()->detach();

            $post->users()->detach();  

              $post->delete();

            $post->delete();

            Session::flash('success', 'This post was successfully removed.');

            return redirect()->route('post.index');

        }

       



    }



}



