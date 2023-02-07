@extends('layouts.app')

@extends('layouts.nav')

@section('content')


    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All Storage Categories</h1>
        <a class="btn btn-success" href="{{ route('admin.StorageCategory.create') }}">Add a Category</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <th>id</th>
                <th>Storage Category</th>
                <th>Storage Category Image</th>
              
                <th></th>

            </thead>
            <tbody>





                @foreach ($StorageCategory as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->storage_cat_name }}</td>

                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->storage_cat_img) }}"></td>
                        <td><a href="{{ route('admin.StorageCategory.edit', $row->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <form class="float-end" method="post"
                            action="{{ route('admin.StorageCategory.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><input onclick="return confirm('Are you sure you want to delete this Category?')"
                                    type="submit" class="btn btn-danger btn-sm" value="Delete" /></td>
                        </form>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>







@endsection
