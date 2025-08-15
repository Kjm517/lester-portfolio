<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = Portfolio::orderBy('created_at', 'desc')->get();
            
            // Add full image URL to each project
            $projects->each(function ($project) {
                $project->project_image_url = $project->project_image_url;
            });
            
            return response()->json([
                'success' => true,
                'projects' => $projects
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching projects: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'technologies' => 'nullable|string|max:500',
                'link' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('project-images', 'public');
            }

            $project = Portfolio::create([
                'project_name' => $request->name,
                'project_description' => $request->description,
                'programming_language' => $request->technologies,
                'link' => $request->link,
                'project_image' => $imagePath
            ]);

            // Add the full image URL to the response
            $project->project_image_url = $project->project_image_url;

            return response()->json([
                'success' => true,
                'project' => $project
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating project: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $project = Portfolio::findOrFail($id);
            
            // Add full image URL to the project
            $project->project_image_url = $project->project_image_url;
            
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $project = Portfolio::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'technologies' => 'nullable|string|max:500',
                'link' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imagePath = $project->project_image;
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('project-images', 'public');
            }

            $project->update([
                'project_name' => $request->name,
                'project_description' => $request->description,
                'programming_language' => $request->technologies,
                'link' => $request->link,
                'project_image' => $imagePath
            ]);

            // Add full image URL to the response
            $project->project_image_url = $project->project_image_url;

            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating project: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $project = Portfolio::findOrFail($id);
            
            // Delete image file if exists
            if ($project->project_image && Storage::disk('public')->exists($project->project_image)) {
                Storage::disk('public')->delete($project->project_image);
            }
            
            $project->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Project deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting project: ' . $e->getMessage()
            ], 500);
        }
    }
}
