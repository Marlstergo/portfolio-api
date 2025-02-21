<?php

namespace App\Http\Controllers;

use App\Events\AddToNewsletter;
use App\Mail\UserContactMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ColdMail extends Controller
{
  public function SendMail(Request $request)
  {
    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'message' => 'required|string',
    ]);

    $data = $request->only('first_name', 'last_name', 'email', 'message', 'phone');

    try {
      Mail::to('marlstergo@gmail.com')->send(new UserContactMail($data));

      event(new AddToNewsletter([
        'email' => $data['email'],
        'name' => $data['first_name'] . ' ' . $data['last_name'],
        'phone' => $data['phone'] ?? null,
        'source' => 'contact form',
      ]));
    } catch (Exception $e) {
      Log::error('Failed to send email', ['error' => $e->getMessage()]);
      return response()->json(['error' => 'Failed to send email'], 500);
    }



    return response()->json(['message' => 'Email sent successfully']);
  }
}
