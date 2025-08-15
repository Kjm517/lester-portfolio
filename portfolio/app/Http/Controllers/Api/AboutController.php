<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return response()->json(['abouts' => $abouts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'skills' => 'nullable|string'
        ]);

        $about = About::create($request->all());
        return response()->json(['about' => $about], 201);
    }

    public function show(About $about)
    {
        return response()->json(['about' => $about]);
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'description' => 'required|string',
            'skills' => 'nullable|string'
        ]);

        $about->update($request->all());
        return response()->json(['about' => $about]);
    }

    public function destroy(About $about)
    {
        $about->delete();
        return response()->json(['message' => 'About deleted successfully']);
    }
}