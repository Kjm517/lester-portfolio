<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_year', 'desc')
                                ->orderBy('start_month', 'desc')
                                ->get();
        return response()->json(['experiences' => $experiences]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|min:1900|max:2050',
            'end_month' => 'nullable|integer|between:1,12',
            'end_year' => 'nullable|integer|min:1900|max:2050'
        ]);

        $experience = Experience::create($request->all());
        return response()->json(['experience' => $experience], 201);
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|min:1900|max:2050',
            'end_month' => 'nullable|integer|between:1,12',
            'end_year' => 'nullable|integer|min:1900|max:2050'
        ]);

        $experience->update($request->all());
        return response()->json(['experience' => $experience]);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json(['message' => 'Experience deleted successfully']);
    }
}