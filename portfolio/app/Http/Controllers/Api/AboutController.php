<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AboutController extends Controller
{
    public function index(): JsonResponse
    {
        $abouts = About::all();
        
        return response()->json([
            'success' => true,
            'abouts' => $abouts
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'skills' => 'nullable|string'
        ]);

        $about = About::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'About created successfully',
            'about' => $about
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $about = About::findOrFail($id);
        
        $validated = $request->validate([
            'description' => 'required|string',
            'skills' => 'nullable|string'
        ]);

        $about->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'About updated successfully',
            'about' => $about
        ]);
    }
}