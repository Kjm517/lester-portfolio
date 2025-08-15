<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $awards = Award::orderBy('created_at', 'desc')->get();
            
            // Add full photo URL to each award
            $awards->each(function ($award) {
                $award->photo_url = $award->photo_url;
            });
            
            return response()->json([
                'success' => true,
                'awards' => $awards
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching awards: ' . $e->getMessage()
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
                'company' => 'required|string|max:255',
                'expiry' => 'nullable|date',
                'link' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('award-images', 'public');
            }

            $award = Award::create([
                'award_name' => $request->name,
                'company' => $request->company,
                'expiration' => $request->expiry,
                'cert_link' => $request->link,
                'photo' => $imagePath
            ]);

            // Add full photo URL to the response
            $award->photo_url = $award->photo_url;

            return response()->json([
                'success' => true,
                'award' => $award
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating award: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $award = Award::findOrFail($id);
            
            // Add full photo URL to the award
            $award->photo_url = $award->photo_url;
            
            return response()->json([
                'success' => true,
                'award' => $award
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Award not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $award = Award::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'expiry' => 'nullable|date',
                'link' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imagePath = $award->photo;
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('award-images', 'public');
            }

            $award->update([
                'award_name' => $request->name,
                'company' => $request->company,
                'expiration' => $request->expiry,
                'cert_link' => $request->link,
                'photo' => $imagePath
            ]);

            // Add full photo URL to the response
            $award->photo_url = $award->photo_url;

            return response()->json([
                'success' => true,
                'award' => $award
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating award: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $award = Award::findOrFail($id);
            
            // Delete image file if exists
            if ($award->photo && Storage::disk('public')->exists($award->photo)) {
                Storage::disk('public')->delete($award->photo);
            }
            
            $award->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Award deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting award: ' . $e->getMessage()
            ], 500);
        }
    }
}
