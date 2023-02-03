@extends('layouts.app')
@extends('layouts.nav')
@section('content')

    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center mt-5">All Employees</h1>      
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a><br><br><br>
        @if (Auth::check())
            <table class="table table-striped">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th></th>
                    <th></th>

                </thead>
                <tbody>
                    @foreach ($employees as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>

                            <td><a href="{{ route('admin.employees.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a></td>

                            <form class="float-end" method="post" action="{{ route('admin.employees.destroy', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <td><input onclick="return confirm('Are you sure you want to delete this movie?')"
                                        type="submit" class="btn btn-danger btn-sm" value="Delete" /></td>
                            </form>



                        </tr>


                    @endforeach
                </tbody>
            </table>
            <span>

                {{$employees->links()}}
            </span>
    </div>
    @endif

@endsection
