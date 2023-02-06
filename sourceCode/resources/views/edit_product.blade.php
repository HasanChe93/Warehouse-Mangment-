@extends('layouts.app')
@extends('layouts.nav')

@section('content')

    <div class="container col-6 mt-2">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">Edit Product
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.products.update', $products->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Product Name: </label>
                        <div class="col-sm-10">
                            <input type="text" name="product_name" class="form-control"
                                value="{{ $products->product_name }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Category: </label>
                        <div class="col-sm-10">
                        <select name="cat_id" class="form-control">
                            <option  disabled="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Brand Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="brand_name" class="form-control"
                                value="{{ $products->brand_name }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Shipper Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipper_name" class="form-control"
                                value="{{ $products->shipper_name }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Product Model</label>
                        <div class="col-sm-10">
                            <input type="number" name="product_model" min="1990" max="2023" class="form-control"
                                value="{{ $products->product_model }}" />
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Product Quantity </label>
                        <div class="col-sm-10">
                            <input type="number" name="product_quantity" min="50" max="100"
                                value="{{ $products->product_quantity }}"class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Product Price </label>
                        <div class="col-sm-10">
                            <input type="number" name="product_price" min="50" max="100" class="form-control"
                                value="{{ $products->product_price }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="product_description" class="form-control" value="{{ $products->product_description }}"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-flex justify-content-start mb-2">
                            <img src="{{ asset('images/' . $file_name1) }}" alt="Image"width="100"
                            class="img-thumbnail">
                          

                            <input class="form-control" type="file" id="image" name="image">

                            <input type="hidden" name="product_image1" value="{{ $products->product_image1 }}" />
                        </div>
                        <div class="d-flex justify-content-start mb-2">

                            <img src="{{ asset('images/' . $products->product_image2) }}" width="100"
                                class="img-thumbnail" />

                            <input class="form-control" type="file" id="image" name="image">

                            <input type="hidden" name="product_image2" value="{{ $products->product_image2 }}" />
                        </div>
                        <div class="d-flex justify-content-start mb-2">

                            <img src="{{ asset('images/' . $products->product_image3) }}" width="100"
                                class="img-thumbnail" />

                            <input class="form-control" type="file" id="image" name="image">

                            <input type="hidden" name="product_image3" value="{{ $products->product_image3 }}" />
                        </div>
                        <div class="d-flex justify-content-start mb-2">

                            <img src="{{ asset('images/' . $products->product_image4) }}" width="100"
                                class="img-thumbnail" />

                            <input class="form-control" type="file" id="image" name="image">

                            <input type="hidden" name="product_image4" value="{{ $products->product_image4 }}" />
                        </div>
                    </div>


            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary float-end" value="Update details" />
            </div>
            </form>
        </div>
    </div>

    </div>

@endsection
