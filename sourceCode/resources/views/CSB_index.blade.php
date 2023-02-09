@extends('layouts.app')
@extends('layouts.nav')
@section('content')




<h1>Custom Storage Bookings</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Storage Dimensions</th>
            <th>Storage Category</th>
            <th>Details</th>
            <th>Total Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($customStorageBookings as $customStorageBooking)
            <tr>
                <td>{{ $customStorageBooking->id }}</td>
                <td>{{ $customStorageBooking->storage_dimensions }}</td>
                <td>{{ $customStorageBooking->storageCategory->name }}</td>
                <td>{{ $customStorageBooking->details }}</td>
                <td>{{ $customStorageBooking->total_amount }}</td>
                <td>
                    <a href="{{ route('admin.custom_storage_booking.approve', $customStorageBooking) }}" class="btn btn-success">Approve</a>
                    <a href="{{ route('admin.custom_storage_booking.deny', $customStorageBooking) }}" class="btn btn-danger">Deny</a>
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
