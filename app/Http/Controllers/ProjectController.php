<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $projects = Project::all();
    return ProjectResource::collection($projects);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $request->validate([
      "name" => "required|string|max:255",
      "description" => "required|string",
    ]);
    $projectData = [
      "name" => $request->name,
      "description" => $request->description,
      "image" => $request->image,
    ];

    if (Project::projectExists($request->name)) {
      return response()->json([
        "message" => "Project already exists"
      ], 400);
    }

    $project = Project::create($projectData);

    $project->tags()->attach($request->tags);

    return response()->json([
      "message" => "Project created successfully",
      "project" => new ProjectResource($project)
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
  public function show($id)
  {
    try {
      $project = Project::findOrFail($id);
      return response()->json($project);
    } catch (ModelNotFoundException $e) {
      return response()->json(['error' => 'Project not found'], 404);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Project $project)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Project $project)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Project $project)
  {
    //
  }
}
