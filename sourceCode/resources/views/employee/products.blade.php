@extends('layouts.app')

@extends('layouts.nav')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All Procducts</h1>
        <a class="btn btn-success" href="{{ route('admin.products.create') }}">Add Product</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <th>Product Number</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Brand Name</th>
                <th>Shipper Name </th>
                <th>Product Model</th>
                <th>Product Quantity </th>
                <th>Product Price(USD) </th>
                <th>Product Description </th>
                <th>Product Image_1</th>
                <th>Product Image_2</th>
                <th>Product Image_3</th>
                <th>Product Image_4</th>
               

                <th></th>

            </thead>
            <tbody>





                @foreach ($products as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->cat_name }}</td>
                        <td>{{ $row->brand_name }}</td>
                        <td>{{ $row->shipper_name }}</td>
                        <td>{{ $row->product_model }}</td>
                        <td>{{ $row->product_quantity }}</td>
                        <td>{{ $row->product_price }}</td>
                        <td>{{ $row->product_description }}</td>
                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->product_image1) }}"></td>
                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->product_image2) }}"></td>
                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->product_image3) }}"></td>
                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->product_image4) }}"></td>
                        
                        <td><a href="{{ route('admin.products.edit', $row->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <form class="float-end" method="post"
                            action="{{ route('admin.products.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><input onclick="return confirm('Are you sure you want to delete this Product?')"
                                    type="submit" class="btn btn-danger btn-sm" value="Delete" /></td>
                        </form>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
