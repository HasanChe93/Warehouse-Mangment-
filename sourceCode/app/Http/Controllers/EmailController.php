<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email'          => 'required',
        ]);

        $email = new Email();

        $email->email = $request->email;
        $email->save();

        return redirect()->back()->with('success', 'Room Data Add successfully');
    }
}
