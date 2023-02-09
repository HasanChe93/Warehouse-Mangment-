@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Booking Details') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>{{ __('Storage Description') }}</td>
                            <td>{{ $booking->storage_details }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Storage Dimensions') }}</td>
                            <td>{{ $booking->storage_dimensions }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Starting Date') }}</td>
                            <td>{{ $booking->starting_date }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ending Date') }}</td>
                            <td>{{ $booking->ending_date }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Price') }}</td>
                            <td>{{ $booking->price }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Status') }}</td>
                            <td>
                                @if ($booking->status == 0)
                                    {{ __('Pending') }}
                                @elseif ($booking->status == 1)
                                    {{ __('Approved') }}
                                @else
                                    {{ __('Denied') }}
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
