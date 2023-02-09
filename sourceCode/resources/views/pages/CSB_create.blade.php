@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Storage Booking Request</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storage-bookings.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="storage_details" class="col-md-4 col-form-label text-md-right">Storage
                                    Description</label>

                                <div class="col-md-6">
                                    <input id="storage_details" type="text"
                                        class="form-control @error('storage_details') is-invalid @enderror"
                                        name="storage_details" value="{{ old('storage_details') }}" required
                                        autocomplete="storage_details" autofocus>

                                    @error('storage_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="storage_dimensions" class="col-md-4 col-form-label text-md-right">Storage
                                    Dimensions</label>

                                <div class="col-md-6">
                                    <input id="storage_dimensions" type="text"
                                        class="form-control @error('storage_dimensions') is-invalid @enderror"
                                        name="storage_dimensions" value="{{ old('storage_dimensions') }}" required
                                        autocomplete="storage_dimensions">

                                    @error('storage_dimensions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="starting_date" class="col-md-4 col-form-label text-md-right">Starting
                                    Date</label>

                                <div class="col-md-6">
                                    <input id="starting_date" type="date"
                                        class="form-control @error('starting_date') is-invalid @enderror"
                                        name="starting_date" value="{{ old('starting_date') }}" required
                                        autocomplete="starting_date">

                                    @error('starting_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ending_date">Ending Date:</label>
                                <input type="date" class="form-control" id="ending_date" name="ending_date" required>
                            </div>
                            <div class="form-group row">
                                <label for="storage_cat_id">Storage Category:</label>
                                <select class="form-control" id="storage_cat_id" name="storage_cat_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->storage_cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
