<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $abouts = About::all();
            
            return response()->json([
                'success' => true,
                'abouts' => $abouts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required|string',
                'skills' => 'nullable|string'
            ]);

            $about = About::create([
                'description' => $request->description,
                'skills' => $request->skills
            ]);

            return response()->json([
                'success' => true,
                'about' => $about
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating about: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'description' => 'required|string',
                'skills' => 'nullable|string'
            ]);

            $about = About::findOrFail($id);
            $about->update([
                'description' => $request->description,
                'skills' => $request->skills
            ]);

            return response()->json([
                'success' => true,
                'about' => $about
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating about: ' . $e->getMessage()
            ], 500);
        }
    }
}