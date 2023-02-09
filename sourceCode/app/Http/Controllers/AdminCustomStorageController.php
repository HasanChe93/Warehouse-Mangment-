<?php

namespace App\Http\Controllers;

use App\Models\StorageCategory;
use App\Models\CustomStorage;
use Illuminate\Http\Request;

class AdminCustomStorageController extends Controller
{

    public function index()
    {
        $customStorages = CustomStorage::where('status', CustomStorage::STATUS_PENDING)->get();

        return view('admin.custom_storages')->with('customStorages', $customStorages);
    }

    public function approve(CustomStorage $customStorage)
    {
        $customStorage->update(['status' => CustomStorage::STATUS_APPROVED]);

        return redirect()->route('admin.custom_storages.index')->with('success', 'Custom storage booking approved successfully!');
    }

    public function deny(CustomStorage $customStorage)
    {
        $customStorage->update(['status' => CustomStorage::STATUS_DENIED]);

        return redirect()->route('admin.custom_storages.index')->with('success', 'Custom storage booking denied successfully!');
    }

    public function update(Request $request, CustomStorage $customStorage)
{
    $validatedData = $request->validate([
        'price' => 'required|numeric',
    ]);

    $customStorage->update([
        'price' => $validatedData['price'],
    ]);

    return redirect()->route('admin.custom_storages.index')->with('success', 'Custom storage price updated successfully.');
}
}
class CustomStorageController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DENIED = 'denied';
}


