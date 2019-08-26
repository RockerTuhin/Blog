<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
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

        $permissions = Permission::all();

        return view('admin.permission.show',compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.permission.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([

            'name' => 'required | max:50 | unique:permissions',

            'for' => 'required',

        ]);

        $permission = new Permission;

        $permission->name = $request->name;

        $permission->for = $request->for;

        $permission->save();

        return redirect(route('permission.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        
        $permission = Permission::find($permission->id);

        return view('admin.permission.edit',compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        
        $request->validate([

            'name' => 'required|max:50',

            'for' => 'required',

        ]);

        $permission = Permission::find($permission->id);

        $permission->name = $request->name;

        $permission->for = $request->for;

        $permission->save();

        return redirect(route('permission.index'))->with('message','Permission updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {

        //return $permission;

        Permission::where('id',$permission->id)->delete();

        return redirect()->back()->with('message','Permission Deleted Successfully');

    }
}
