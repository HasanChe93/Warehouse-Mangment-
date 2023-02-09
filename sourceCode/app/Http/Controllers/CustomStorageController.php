<?php

namespace App\Http\Controllers;


use App\Models\StorageCategory;
use App\Models\CustomStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomStorageController extends Controller
{
    public function create()
    {
        $storageCategories = StorageCategory::all();

        return view('custom_storages.create', [
            'storageCategories' => $storageCategories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'storage_price' => 'required|numeric',
            'storage_name' => 'required|string',
            'storage_cat_id' => 'required|exists:storage_categories,id',
            'storage_description' => 'required|string',
        ]);

        $customStorage = new CustomStorage();
        $customStorage->user_id = Auth::id();
        $customStorage->storage_price = $validatedData['storage_price'];
        $customStorage->storage_name = $validatedData['storage_name'];
        $customStorage->storage_cat_id = $validatedData['storage_cat_id'];
        $customStorage->storage_description = $validatedData['storage_description'];
        $customStorage->start_date = $validatedData['start_date'];
        $customStorage->end_date = $validatedData['end_date'];
        $customStorage->status = CustomStorage::STATUS_PENDING;
        $customStorage->save();

        return redirect()->route('home')->with('success', 'Custom storage booking request sent successfully.');
    }

    public function adminIndex()
    {
        $customStorages = CustomStorage::whereIn('status', [
            CustomStorage::STATUS_PENDING,
            CustomStorage::STATUS_APPROVED,
            CustomStorage::STATUS_DENIED,
        ])->get();

        return view('custom_storages.admin_index', [
            'customStorages' => $customStorages,
        ]);
    }

    public function approve(CustomStorage $customStorage)
    {
        $customStorage->status = CustomStorage::STATUS_APPROVED;
        $customStorage->save();

        return redirect()->route('custom_storages.admin_index')->with('success', 'Custom storage booking request approved successfully.');
    }

    public function deny(CustomStorage $customStorage)
    {
        $customStorage->status = CustomStorage::STATUS_DENIED;
        $customStorage->save();

        return redirect()->route('custom_storages.admin_index')->with('success', 'Custom storage booking request denied successfully.');
    }

    public function userIndex()
    {
        $customStorages = CustomStorage::where('user_id', Auth::id())->get();

        return view('custom_storages.user_index', [
            'customStorages' => $customStorages,
        ]);
    }
}
