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
            <div class="card-header">Edit Storage Category details
                <a href="{{ route('admin.StorageCategory.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.StorageCategory.update', $StorageCategory->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Storage Category Name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="storage_cat_name" class="form-control"
                                value="{{ $StorageCategory->storage_cat_name }}" />
                        </div>
                    </div>




                    <img src="{{ asset('images/' . $StorageCategory->storage_cat_img) }}" width="100" class="img-thumbnail" name="storage_cat_img" />
                    <div class="form-group mb-5">
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <input type="hidden" name="hidden_img" value="{{ $StorageCategory->storage_cat_img }}" />

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary float-end" value="Update details" />
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
