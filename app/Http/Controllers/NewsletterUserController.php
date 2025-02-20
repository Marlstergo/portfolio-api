<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterUserRequest;
use App\Http\Requests\UpdateNewsletterUserRequest;
use App\Models\NewsletterUser;
use Illuminate\Http\Request;

class NewsletterUserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $newsletterUsers = NewsletterUser::all();
    return response()->json($newsletterUsers);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $data = [
      "email" => $request->email,
      "name" => $request->name,
      "phone" => $request->phone,
      "source" => $request->source,
    ];

    $request->validate([
      "email" => "required|email",
      "source" => "required|string",
    ]);

    NewsletterUser::create($data);

    return response()->json([
      "message" => "Newsletter user created successfully",
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreNewsletterUserRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(NewsletterUser $newsletterUser)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(NewsletterUser $newsletterUser)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateNewsletterUserRequest $request, NewsletterUser $newsletterUser)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(NewsletterUser $newsletterUser)
  {
    //
  }
}
