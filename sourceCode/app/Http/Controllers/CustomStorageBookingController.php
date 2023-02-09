<?php

namespace App\Http\Controllers;

use App\Models\CustomStorageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomStorageBookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:storage_categories,id',
            'details' => 'required|string',
            'dimensions' => 'required|string',
        ]);

        $customStorageBooking = new CustomStorageBooking();
        $customStorageBooking->user_id = Auth::id();
        $customStorageBooking->category_id = $request->category_id;
        $customStorageBooking->details = $request->details;
        $customStorageBooking->dimensions = $request->dimensions;
        $customStorageBooking->save();

        return redirect()->route('user.profile')->with('success', 'Your custom storage booking has been submitted successfully.');
    }
    
    

    public function index()
{
    $user = Auth::user();
    $customStorageBookings = $user->customStorageBookings;
    return view('CSB_index', ['customStorageBookings' => $customStorageBookings]);
}

    

    public function approve($customStorageBooking, Request $request)
    {
        $request->validate([
            'status' => 'required|in:approved,denied',
            'amount' => 'nullable|numeric',
        ]);

        $customStorageBooking->status = $request->status;
        if ($request->status === 'approved') {
            $customStorageBooking->amount = $request->amount;
        }
        $customStorageBooking->save();

        return redirect()->route('CSB_index')->with('success', 'The custom storage booking has been updated successfully.');
    }
}
