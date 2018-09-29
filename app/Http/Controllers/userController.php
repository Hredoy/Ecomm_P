<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\User;

use App\Role;

use App\posts;

use Auth;

use DB;

use Session;

use Hash;

use Input;

class userController extends Controller

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

            $users =  User::all();

            return view('user.index')->withUser($users);

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

        $user = User::find(Auth::id());

        $role  = Role::all();

        return view('user.create')->withRole($role)->withAuths($user);

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

        $this->validateWith([

        'name' => 'required|max:255',

        'email' => 'required|email|unique:users'

      ]);

      

      $password = trim($request->password);

      $user = new User;

      $user->name = $request->name;

      $user->email = $request->email;

      $user->password = Hash::make($password);

      $user->save();

      if ($request->roles) {

        $user->syncRoles(explode(',', $request->roles));

      }

      return redirect()->route('user.index', $user->id);



    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find(Auth::id());

        $role  = Role::all( );

        $user = User::where('id', $id)->with('roles')->first();

        return view('user.edit')->withRole($role)->withUser($user)->withAuths($user);

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

        $this->validateWith([

        'name' => 'required|max:255',

      ]);

      

      $password = trim($request->password);

      $user = User::findOrFail($id);

      $user->name = $request->name;

      $user->email = $request->email;

      $user->password = Hash::make($password);

      $user->save();

      if ($request->roles) {

        $user->syncRoles(explode(',', $request->roles));

      }

      return redirect()->route('user.index', $user->id);



    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $user = User::find($id);

        $user->roles()->detach($id);

        $user->delete();

        Session::flash('success', 'The User was successfully Removed.');

        return redirect()->route('user.index');

    }

}

