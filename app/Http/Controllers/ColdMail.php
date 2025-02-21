<?php

namespace App\Http\Controllers;

use App\Mail\UserContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ColdMail extends Controller
{
  public function SendMail(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'message' => 'required|string',
    ]);

    $data = $request->only('name', 'email', 'message');

    Mail::to('marlstergo@gmail.com')->send(new UserContactMail($data));

    return response()->json(['message' => 'Email sent successfully']);
  }
}
