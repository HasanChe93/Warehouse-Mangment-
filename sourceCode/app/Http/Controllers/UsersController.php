<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
$users = User::where('role', '!=', 'admin')->paginate(7);


        return view('users', [
            'users' => $users,
           
        ]);
    }        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_user');
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
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
    
        return redirect('admin/users')->with('success', $request->name . ' User created successfully');
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
        

    $users=User::where('id',$id)->get();
        return view('edit_users', ['users'=>$users]);
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
            'name'          =>'required',
            'email'   =>'required|email',
            'role'        =>'required',


        ]);
        User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=> $request->email,
            'role'=>$request->role
        ]);
        // return redirect()->route('users.index')->with('success','data has been updated successfully');
        return redirect('admin/users')->with('success', $request->name .' User Data update successfully');
    }














    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = User::find($id);
        $userDestroy->destroy($id);
        return redirect('admin/users')->with('success', 'User Data deleted successfully');
    }
}
