@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Storage Booking Requests') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Storage Details</th>
                                    <th>Storage Dimensions</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($storageBookings as $storageBooking)
                                    <tr>
                                        <td>{{ $storageBooking->id }}</td>
                                        <td>{{ $storageBooking->storage_details }}</td>
                                        <td>{{ $storageBooking->storage_dimensions }}</td>
                                        <td>{{ $storageBooking->starting_date }}</td>
                                        <td>{{ $storageBooking->ending_date }}</td>
                                        <td>{{ $storageBooking->price }}</td>
                                        <td>
                                            @if($storageBooking->status == 0)
                                                Pending
                                            @elseif($storageBooking->status == 1)
                                                Approved
                                            @else
                                                Denied
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->is_admin)
                                                <a href="{{ route('storageBooking.edit', $storageBooking->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('storageBooking.destroy', $storageBooking->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $storageBookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
