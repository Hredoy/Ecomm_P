<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\categorys;

use App\subs;

use App\User;

use App\posts;

use Auth;

use Session;

class categorysController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

         if(Auth::guest())

            {

                return redirect()->route('login');

            }else{

            $cat = categorys::paginate(5);

            $parent = categorys::all();

            return view('categorys.index')->withCat($cat)->withParent($parent);

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

        $user = User::find(Auth::id());

            $this->validate($request,array(

                'name' => 'required|max:255'

            ));

            if($request->parent == 0){

                $cat = new categorys;

                $cat->name = $request->name;

                $cat->save();

            }else{

                

                $cat = new categorys;

                $cat->name = $request->name;

                $cat->parent = 1;

                $cat->save();

                $sub = new subs;

                $sub->id = $cat->id;

                $sub->name = $request->name;

                $sub->save();

                $sub->categorys()->sync($request->parent, false);

            }

            

            

            Session::flash('success',"New Category Successfully Added");



            return redirect()->route('categorys.index');

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

        $cat = categorys::find($id);
        $cats= categorys::all()->where('parent','0');
        return view('categorys.edit')->withCat($cat)->withCats($cats);

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

        $this->validate($request,array(

                'name' => 'required|max:255'

            ));

            if($request->parent == 0){

                $cat = categorys::find($id);

                $cat->name = $request->name;

                $cat->save();

            }else{

                

                $cat =categorys::find($id);

                $cat->name = $request->name;

                $cat->parent = 1;

                $cat->save();

                $sub = subs::find($cat->id);

                $sub->id = $cat->id;

                $sub->name = $request->name;

                $sub->save();

            }




        Session::flash('success',"Category Successfully Updated");



        return redirect()->route('categorys.index');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request, $id)

    {

        if($request->parent == 0){

            $cat = categorys::find($id);

            $cat->posts()->detach();

            $cat->delete();

        }else{

            $cat = categorys::find($id);

            $cat->posts()->detach();

            $cat->delete();

            $sub = subs::find($id);

            $sub->categorys()->detach();

            $sub->delete();

        }

        Session::flash('success', 'This Category is successfully removed.');

        return redirect()->route('categorys.index');

    }

}

