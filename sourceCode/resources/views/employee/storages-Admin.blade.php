@extends('layouts.app')

@extends('layouts.nav')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All Storages</h1>
        <a class="btn btn-success" href="{{ route('admin.storagesAdmin.create') }}">Add Storage</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <th>Storage Number</th>
                <th>Storage Name</th>
                <th>Storage Dimensions</th>                
                <th>Price/S.M</th>
                <th>Storage Category Name</th>

                <th>Status</th>
                <th>Storage Description</th>
                <th>Storage Image</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>



                {{-- {{$categories}}
{{$rooms}} --}}


                @foreach ($storages as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->storage_name }}</td>
                
                        <td>{{ $row->storage_dimensions }}</td>
                        <td>{{ $row->s_meter_price }} $</td>
                        <td>{{ $row->storage_cat_name }}</td>
                       
                        <td>
                            @if ($row->status == 1)
                                {{ 'Avillable' }}
                            @else
                                {{ 'Bocked' }}
                            @endif
                        </td>

                        <td>{{ $row->storage_description }}</td>

                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->storage_image) }}"></td>
                        <td><a href="{{ route('admin.storagesAdmin.edit', $row->id) }}"
                                class="btn btn-warning btn-sm">Edit</a></td>
                        <form class="float-end" method="post" action="{{ route('admin.storagesAdmin.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><input onclick="return confirm('Are you sure you want to delete this Room?')" type="submit"
                                    class="btn btn-danger btn-sm" value="Delete" /></td>
                        </form>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
