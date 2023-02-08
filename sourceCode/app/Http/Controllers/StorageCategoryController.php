<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StorageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StorageCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('employee');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $StorageCategories = StorageCategory::all();
        return view('StorageCategory-Admin', ['StorageCategories' => $StorageCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $StorageCategories = StorageCategory::all();
        return view('add_StorageCategory', [
            'StorageCategories' => $StorageCategories,
            'auth_user' => Auth::user(),

        ]);
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
            'storage_cat_name'          => 'required',
            'storage_cat_img'           => 'required|image'

        ]);

        $file_name = time() . '.' . request()->storage_cat_img->getClientOriginalExtension();
        request()->storage_cat_img->move(public_path('images'), $file_name);
        $StorageCategory = new StorageCategory();
        $StorageCategory->storage_cat_name = $request->storage_cat_name;
        $StorageCategory->storage_cat_img = $file_name;
        $StorageCategory->save();
        return redirect('admin/StorageCategory')->with(['success' => "$StorageCategory->storage_cat_name Had Been Added Successfully"]);
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

        $StorageCategories = StorageCategory::find($id);
        return view('edit_StorageCategory', [
            'StorageCategories' => $StorageCategories,
            'auth_user' => Auth::user(),

        ]);
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
            'storage_cat_name'          => 'required',
            'storage_cat_img'

        ]);

        if ($request->image != "") {
            $storage_cat_img = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $storage_cat_img);
        } else {
            $storage_cat_img = $request->hidden_img;
        }


        $StorageCategory = StorageCategory::find($id);
        $StorageCategory->storage_cat_name = $request->storage_cat_name;
        $StorageCategory->storage_cat_img = $storage_cat_img;
        $StorageCategory->save();




        return redirect('admin/StorageCategory')->with(['success' => "$StorageCategory->storage_cat_name Had Been Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = StorageCategory::find($id);
        $userDestroy->destroy($id);
        return redirect('admin/StorageCategory')->with('success', ' Storage-Category Had Been Deleted Successfully');
    }
}
