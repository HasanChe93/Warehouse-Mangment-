<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use App\Models\StorageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoragesController extends Controller
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

        $storages = DB::table('storages')
            ->join('storage_categories', 'storages.storage_cat_id', '=', 'storage_categories.id')
            ->select('storages.*', 'storage_categories.storage_cat_name')
            ->get();

        return view('storages-Admin', ['storages' => $storages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $StorageCategories = StorageCategory::all();
        return view('add_storages', [
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
            'storage_name'          => 'required',
            'storage_dimensions'          => 'required',

            's_meter_price'        => 'required',
            'storage_description'   => 'required',
            'storage_image'           => 'required|image'
        ]);

        $file_name = time() . '.' . request()->storage_image->getClientOriginalExtension();

        request()->storage_image->move(public_path('images'), $file_name);

        $storage = new storage;
        $storage->storage_name = $request->storage_name;

        $storage->storage_dimensions = $request->storage_dimensions;
        $storage->storage_cat_id = $request->storage_cat_name;
        $storage->s_meter_price = $request->s_meter_price;
        $storage->storage_description = $request->storage_description;
        $storage->storage_image = $file_name;

        $storage->save();

        return redirect('admin/storagesAdmin')->with('success', $request->storage_name . ' Has Been created successfully');
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

        $StorageCategories = StorageCategory::all();
        $storages = Storage::find($id);
        return view('edit_storage', [
            'StorageCategories' => $StorageCategories,
            'storages' => $storages,
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
            'storage_name'          => 'required',

            'storage_dimensions'          => 'required',
            'storage_cat_id'          => 'required',
            's_meter_price'        => 'required',
            'storage_description'   => 'required',
            'status'        => 'required',
            'storage_image'     ,


        ]);



        if ($request->image != "") {
            $storage_image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $storage_image);
        } else {
            $storage_image = $request->hidden_img;
        }


        $storages = Storage::find($id);
        $storages->storage_name = $request->storage_name;

        $storages->storage_dimensions = $request->storage_dimensions;
        $storages->storage_cat_id = $request->storage_cat_name;
        $storages->s_meter_price = $request->s_meter_price;
        $storages->storage_description = $request->storage_description;
        $storages->storage_image = $storage_image;

        $storages->save();
        




        return redirect('admin/storagesAdmin')->with('success', $request->storage_name . ' Has Been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = Storage::find($id);
        $userDestroy->destroy($id);
        return redirect('admin/storagesAdmin')->with('success', ' Storage Data deleted successfully');
    }
}
