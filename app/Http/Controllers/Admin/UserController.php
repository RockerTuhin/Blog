<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = Admin::all();

        return view('admin.user.show',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();

        return view('admin.user.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $request['password'] = Hash::make($request->password);

        $admin = Admin::create($request->all());

        $admin->roles()->sync($request->roles);

        return redirect(route('user.index'))->with('message','User Created Successfully');

        

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

        $user = Admin::find($id);

        $roles = Role::all();

        return view('admin.user.edit',compact('user','roles'));

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
        
        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],

        ]);

        $request->status? : $request['status'] = 0;

        $admin = Admin::where('id',$id)->update($request->except('_token','_method','roles'));

        //return $admin;

        Admin::find($id)->roles()->sync($request->roles);

        return redirect(route('user.index'))->with('message','User updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Admin::find($id)->delete();

        return redirect()->back()->with('message','User Deleted Successfully');

    }
}
