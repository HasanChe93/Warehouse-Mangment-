<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\User;

class ProductEmployeeController extends Controller
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
        $products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.cat_name')
            ->get();

        $productShipper = User::where("role", 'shipper')->get();

        

        return view('products', [
            'products' => $products, 'productShipper' => $productShipper

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $shippers = User::where('role', 'shipper')->get();
        $user_id = Auth::id();
        return view('add_products', [
            'categories' => $categories,
            'shippers' => $shippers,
            'auth_user' => Auth::user(),
            
        ]);
        return view('add_products');
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
            'product_name'          => 'required',
            'brand_name'        => 'required',
            'shipper_name'        => 'required',
            'product_model'           => 'required',
            'product_quantity'         => 'required',
            'product_price'             => 'required',
            'product_description'      => 'required',
            'product_image1'=> 'required|image',
            'product_image2' => 'required|image',
            'product_image3'=> 'required|image',
            'product_image4' => 'required|image'
        ]);

        $file_name1 = time() . '.' . request()->product_image1->getClientOriginalExtension();

        request()->product_image1->move(public_path('images'), $file_name1);


        $file_name2 = time() . '.' . request()->product_image2->getClientOriginalExtension();

        request()->product_image2->move(public_path('images'), $file_name2);
        $file_name3 = time() . '.' . request()->product_image3->getClientOriginalExtension();

        request()->product_image3->move(public_path('images'), $file_name3);
        $file_name4 = time() . '.' . request()->product_image4->getClientOriginalExtension();

        request()->product_image4->move(public_path('images'), $file_name4);


        $product = new Product;
        $product->user_id = $request->user_id;
        $product->product_name = $request->product_name;
        $product->cat_id = $request->cat_name;
        $product->brand_name = $request->brand_name;
        $product->shipper_name = $request->shipper_name;
        $product->product_model = $request->product_model;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->user_id=Auth::user()->id;
        $product->product_image1 = $file_name1;
        $product->product_image2 = $file_name2;
        $product->product_image3 = $file_name3;
        $product->product_image4 = $file_name4;

        $product->save();

        return redirect('employee/products')->with('success', $request->product_name . ' Has Been created successfully');;
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


        $categories = category::all();
        $products = Product::find($id);
        return view('edit_product', [
            'categories' => $categories,
            'products' => $products,
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
            'product_name'          => 'required',
            'cat_id'   => 'required',
            'brand_name'        => 'required',
            'shipper_name'        => 'required',
            'product_model'           => 'required',
            'product_price'             => 'required',
            'product_quantity'         => 'required',
            'product_description'      => 'required',
            'product_image1' => 'required',
            'product_image2' => 'required',
            'product_image3' => 'required',
            'product_image4'=> 'required' 


        ]);

    

        if ($request->product_image1 != "") {
            $product_image1 = time() . '.' . request()->product_image1->getClientOriginalExtension();
            request()->product_image1->move(public_path('images'), $product_image1);
        } 
        
        else {
            $product_image1 = $request->hidden_img;
        }
        //img1
        if ($request->product_image2 != "") {
            $product_image2 = time() . '.' . request()->product_image2->getClientOriginalExtension();
            request()->product_image2->move(public_path('images'), $product_image2);
        } 
        
        else {
            $product_image2 = $request->hidden_img;
        }
        if ($request->product_image3 != "") {
            $product_image3 = time() . '.' . request()->product_image3->getClientOriginalExtension();
            request()->product_image3->move(public_path('images'), $product_image3);
        } 
        
        else {
            $product_image3 = $request->hidden_img;
        }
        if ($request->product_image4 != "") {
            $product_image4 = time() . '.' . request()->product_image4->getClientOriginalExtension();
            request()->product_image4->move(public_path('images'), $product_image4);
        } 
        
        else {
            $product_image4 = $request->hidden_img;
        }


        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->cat_id = $request->cat_name;
        $product->brand_name = $request->brand_name;
        $product->shipper_name = $request->shipper_name;
        $product->product_model = $request->product_model;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->user_id=Auth::user()->id;
        $product->product_image1 = $product_image1;
        $product->product_image2 = $product_image2;
        $product->product_image3 = $product_image3;
        $product->product_image4 = $product_image4;
        $product->save();

        return redirect('employee/products')->with('success', $request->product_name . ' Has Been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = Product::find($id);
        $userDestroy->destroy($id);
        return redirect('employee/products')->with('success', ' Product Data deleted successfully');
    }
}
