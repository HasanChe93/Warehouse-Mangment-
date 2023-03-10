<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class UserPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = $user->id;
        $reservation = DB::table('bookings')->where('user_id', $id)->get();
        return view('pages.userProfile', ['user' => $user, 'reservation' => $reservation]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8'],
            // 'passcon' => ['required', 'string', 'min:8', 'same:password'],

        ]);
        if ($request->image != "") {
            $user_image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $user_image);
        } else {
            $user_image = $request->hidden_img;
        }
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_image' => $user_image,
            'phone' => $request->phone,
            // 'password' => Hash::make($request->password)

        ]);
        // return redirect()->route('users.index')->with('success','data has been updated successfully');
        return redirect('userprofile')->with('success', $request->name . ' User Data update successfully');
    }
    public function customStorageBookings()
    {
        $user = Auth::user();
        $customStorageBookings = $user->customStorageBookings;

        return view('pages.userCustomStorageBookings', ['customStorageBookings' => $customStorageBookings]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingDestroy = Booking::find($id);
        $bookingDestroy->destroy($id);
        return redirect('userprofile')->with('success', 'Reservation Data deleted successfully');
    }
}
