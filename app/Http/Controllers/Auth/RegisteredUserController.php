<?php

namespace App\Http\Controllers\Auth;

use App\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
  /**
   * Handle an incoming registration request.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request): Response
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
      'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
      'bio' => ['nullable', 'string', 'max:255'],
      'avatar' => ['nullable', 'string', 'max:255'],
      'website_url' => ['nullable', 'string', 'max:255'],
      'github_url' => ['nullable', 'string', 'max:255'],
      'twitter_url' => ['nullable', 'string', 'max:255'],
      'location' => ['nullable', 'string', 'max:255'],
      'job_title' => ['nullable', 'string', 'max:255'],
      'company' => ['nullable', 'string', 'max:255'],
      'newsletter_subscription' => ['nullable', 'boolean'],
      'last_login_at' => ['nullable', 'date'],
      'preferred_language' => ['nullable', 'string', 'max:255'],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->string('password')),
      'username' => $request->string('username'),
      'bio' => $request->string('bio'),
      'avatar' => $request->string('avatar'),
      'website_url' => $request->string('website_url'),
      'github_url' => $request->string('github_url'),
      'twitter_url' => $request->string('twitter_url'),
      'location' => $request->string('location'),
      'job_title' => $request->string('job_title'),
      'company' => $request->string('company'),
      'newsletter_subscription' => $request->boolean('newsletter_subscription'),
      'last_login_at' => now(),
      'preferred_language' => $request->string('preferred_language'),
    ]);

    // event(new Registered($user));

    Auth::login($user);

    return response()->noContent();
  }
}
