<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Youtubelink;
use App\User;

class youtubelinkController extends Controller
{
    public function index(){
    	$youtube = Youtubelink::paginate(10);
    	return view('youtube.index')->withYoutube($youtube);
    }
     public function store(Request $request)

    {

        $user = User::find(Auth::id());

                $cat = new Youtubelink;

                $cat->link = $request->link;

                $cat->save();

            Session::flash('success',"New Category Successfully Added");



            return redirect()->route('youtubes.index');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show(wp_terms $cat_name)

    {


    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $cat = Youtubelink::find($id);
        return view('youtube.edit')->withCat($cat);

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

                $cat = Youtubelink::find($id);

                $cat->link = $request->link;

                $cat->save();




        Session::flash('success',"Category Successfully Updated");



        return redirect()->route('youtubes.index');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request, $id)

    {


            $cat = Youtubelink::find($id);

            $cat->delete();

       

        Session::flash('success', 'This Category is successfully removed.');

        return redirect()->route('youtubes.index');

    }
}
