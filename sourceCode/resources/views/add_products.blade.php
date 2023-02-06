@extends('layouts.app')

@extends('layouts.nav')

@section('content')

<div class="container col-6 mt-2">

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add a Product
		<a href="{{route('admin.products.index')}}" class="btn btn-secondary btn-sm float-end" > Go Back</a>
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Name</label>
				<div class="col-sm-10">
					<input type="text" name="product_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Select a Category</label>
				<div class="col-sm-10">
					<select name="cat_name" class="form-control">

						<option value="none" selected="" disabled="">Select a Category</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->cat_name }}</option>
						@endforeach


					</select>
				 
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Brand</label>
				<div class="col-sm-10">
					<input type="text" name="brand_name" class="form-control" />
				</div>
			</div>
			
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Select Shipper</label>
				<div class="col-sm-10">
					<select name="shipper_name" class="form-control">

						<option value="none" selected="" disabled="">Select Shipper</option>
						@foreach ($shippers as $shipper)
							<option value="{{ $shipper->id }}">{{ $shipper->name }}</option>
						@endforeach


					</select>
				 
				</div>
			<div class="row mb-3 my-3">
				<label class="col-sm-2 col-label-form">Product Model</label>
				<div class="col-sm-10">
					<input type="number" name="product_model"  min="1990" max="2023" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Quantity </label>
				<div class="col-sm-10">
					<input type="number" name="product_quantity"  min="50" max="100" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Price </label>
				<div class="col-sm-10">
					<input type="number" name="product_price"  min="50" max="100" class="form-control" />
				</div>
			</div>
			
			
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Description</label>
				<div class="col-sm-10">
					<textarea type="text" name="product_description"  class="form-control" ></textarea>
				</div>
			</div>
			
		

			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image 1</label>
				<div class="col-sm-10">
					<input type="file" name="product_image1" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image 2</label>
				<div class="col-sm-10">
					<input type="file" name="product_image2" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image 3</label>
				<div class="col-sm-10">
					<input type="file" name="product_image3" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image 4</label>
				<div class="col-sm-10">
					<input type="file" name="product_image4" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary float-end" value="Add" />
			</div>
		</form>
	</div>
</div>
</div>
@endsection
