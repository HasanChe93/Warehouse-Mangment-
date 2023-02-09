<h1>My Custom Storage Bookings</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Storage Dimensions</th>
            <th>Storage Category</th>
            <th>Details</th>
            <th>Status</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customStorageBookings as $customStorageBooking)
            <tr>
                <td>{{ $customStorageBooking->id }}</td>
                <td>{{ $customStorageBooking->storage_dimensions }}</td>
                <td>{{ $customStorageBooking->storageCategory->name }}</td>
                <td>{{ $customStorageBooking->details }}</td>
                <td>{{ $customStorageBooking->status }}</td>
                @if ($customStorageBooking->status === 'approved')
                    <td>{{ $customStorageBooking->total_amount }}</td>
                @else
                    <td>N/A</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
