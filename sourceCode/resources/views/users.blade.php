@extends('layouts.app')
@extends('layouts.nav')
@section('content')

    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center mt-5">All Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm float-start"> Create A new User</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a><br><br><br>
        @if (Auth::check())
            <table class="table table-striped">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>User Type</th>
                    <th></th>
                    <th></th>

                </thead>
                <tbody>
                    @foreach ($users as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>

                            <td><a href="{{ route('admin.users.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a></td>

                            <form class="float-end" method="post" action="{{ route('admin.users.destroy', $row->id) }}">
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

                {{$users->links()}}
            </span>
    </div>
    @endif

@endsection
