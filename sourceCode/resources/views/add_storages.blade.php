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
            <div class="card-header">Add Storage
                <a href="{{ route('admin.storagesAdmin.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.storagesAdmin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Storage Names</label>
                        <div class="col-sm-10">
                            <input type="text" name="storage_name" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Storage Dimensions<h5>(meter)</h5></label>
                        <div class="col-sm-10">
                            <input type="binary" name="storage_dimensions" class="form-control" />
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Select a Category</label>
                        <div class="col-sm-10">
                            <select name="storage_cat_name" class="form-control">

                                <option value="none" selected="" disabled="">Select a Category</option>
                                @foreach ($StorageCategories as $StorageCategory)
                                    <option value="{{ $StorageCategory->id }}">{{ $StorageCategory->storage_cat_name }}</option>
                                @endforeach


                            </select>
                         
                        </div>
                    </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="storage_description" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-label-form">Price $</label>
                                <div class="col-sm-10">
                                    <input type="text" name="s_meter_price" class="form-control" />
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-2 col-label-form">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="storage_image" />
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
