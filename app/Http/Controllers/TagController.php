<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagsResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tags = Tag::all();
    return TagsResource::collection($tags);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $tagData = [
      "name" => $request->name,
    ];

    $tag = Tag::create($tagData);

    return response()->json([
      "message" => "Tag created successfully",
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Tag $tags)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tag $tags)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tag $tags)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tag $tags)
  {
    //
  }
}
