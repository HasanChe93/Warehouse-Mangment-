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
            <div class="card-header">Edit storages details
                <a href="{{ route('admin.storagesAdmin.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.storagesAdmin.update', $storages->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Number of beds : </label>
                        <div class="col-sm-10">
                            <input type="text" name="num_of_beds" class="form-control"
                                value="{{ $storages->num_of_beds }}" />
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
                        <label class="col-sm-2 col-label-form">Status </label>
                        <div class="col-sm-10">
                        <select name="status" class="form-control">
                            <option value="none" selected="" disabled="">Booking status</option>

                            <option value="1">Avillable</option>
                            <option value="0">Booked</option>



                        </select>
                        </div>
                    </div>



                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Price : </label>
                        <div class="col-sm-10">
                            <input type="text" name="storage_price" class="form-control" value="{{ $storages->storage_price}}">
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Description : </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="storage_description" class="form-control" rows="3">{{ $storages->storage_description }}</textarea>
                        </div>
                    </div>




                    <img src="{{ asset('images/' . $storages->storage_image) }}" width="100" class="img-thumbnail" />
                    <div class="form-group mb-5">
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <input type="hidden" name="hidden_img" value="{{ $storages->storage_image }}" />

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary float-end" value="Update details" />
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
