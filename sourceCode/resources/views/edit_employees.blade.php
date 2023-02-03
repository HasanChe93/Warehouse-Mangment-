@extends('layouts.app')
@extends('layouts.nav')
@section('content')


    <div class="container col-6 mt-5">


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
            <div class="card-header">Edite User details
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm float-end"> Go Back</a>
            </div>

            @foreach ($employees as $employee)
                <div class="card-body ">
                    <form method="post" action="{{ route('admin.employees.update', $employee->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex justify-content-center py-3">
                            <img src="{{ $employee->user_image }}" class="rounded-circle" width="150" height="150">
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">User Name : </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ $employee->name }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Email : </label>
                            <div class="col-sm-10">
                                <input type="text" name="email" rows="6" class="form-control"
                                    value="{{ $employee->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Phone : </label>
                            <div class="col-sm-10">
                                <input type="phone" name="phone" rows="6" class="form-control"
                                    value="{{ $employee->phone }}">
                            </div>



                        </div>

                        <div class="row mb-4">

                            <label class="col-sm-2 col-label-form">User Role : </label>
                            <div class="col-sm-10">
                                <select name="role" class="form-control">
                                    <option value="none" selected="" disabled="">Select a Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="employee">Employee</option>
                                    <option value="shipper">Shipper</option>
                                </select>
                            </div>
                        </div>


                        <div class="text-center">
                            <input type="submit" class="btn btn-primary float-end" value="Update details" />
                        </div>
                    </form>
                </div>
        </div>

    </div>
    @endforeach
@endsection