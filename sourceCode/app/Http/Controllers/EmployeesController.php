<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
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
        $employees = User::where('role', '=', 'employee')
            
            ->paginate(4);

        // $allUsers = User::get()->where('role', 'user');;
        // $allShippers = User::get()->where('role', 'shipper');
        // $allEmployees = User::get()->where('role', 'employee');


        return view('employees', [
            'employees' => $employees,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_employee');
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
            'employee_type'=>'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'employee_type'=>$request->employee_type

        ]);

        return redirect('admin/employees')->with('success', $request->name . ' Employee created successfully');
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


        $employees = User::where('id', $id)->get();
        return view('edit_employees', ['employees' => $employees]);
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
            'name'          => 'required',
            'email'   => 'required|email',
            'role'        => 'required',
            'employee_type'=>'required'



        ]);
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'employee_type'=>$request->employee_type

        ]);
        // return redirect()->route('employees.index')->with('success','data has been updated successfully');
        return redirect('admin/employees')->with('success', $request->name . '  Data update successfully');
    }
    public function pagination(Request $request)

    {




        return view('employees', compact('employees'));
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
        return redirect('admin/employees')->with('success', 'Employee Data deleted successfully');
    }
}
