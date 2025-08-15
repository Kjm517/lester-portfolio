<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        try {
            $experiences = Experience::orderBy('start_year', 'desc')
                                    ->orderBy('start_month', 'desc')
                                    ->get();
            return response()->json([
                'success' => true,
                'experiences' => $experiences
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching experiences: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'start_month' => 'required|string|max:20',
                'start_year' => 'required|string|max:4',
                'end_month' => 'nullable|string|max:20',
                'end_year' => 'nullable|string|max:4'
            ]);

            // Convert month names to numbers for database storage
            $months = [
                'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
                'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
                'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
            ];

            $experience = Experience::create([
                'position' => $request->title,
                'company' => $request->company,
                'start_month' => $months[$request->start_month] ?? 1,
                'start_year' => (int)$request->start_year,
                'end_month' => $request->end_month === 'Present' ? null : ($months[$request->end_month] ?? null),
                'end_year' => $request->end_year === 'Present' ? null : (int)$request->end_year
            ]);

            return response()->json([
                'success' => true,
                'experience' => $experience
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating experience: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, Experience $experience)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'start_month' => 'required|string|max:20',
                'start_year' => 'required|string|max:4',
                'end_month' => 'nullable|string|max:20',
                'end_year' => 'nullable|string|max:4'
            ]);

            // Convert month names to numbers for database storage
            $months = [
                'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
                'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
                'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
            ];

            $experience->update([
                'position' => $request->title,
                'company' => $request->company,
                'start_month' => $months[$request->start_month] ?? 1,
                'start_year' => (int)$request->start_year,
                'end_month' => $request->end_month === 'Present' ? null : ($months[$request->end_month] ?? null),
                'end_year' => $request->end_year === 'Present' ? null : (int)$request->end_year
            ]);

            return response()->json([
                'success' => true,
                'experience' => $experience
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating experience: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Experience $experience)
    {
        try {
            $experience->delete();
            return response()->json([
                'success' => true,
                'message' => 'Experience deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting experience: ' . $e->getMessage()
            ], 500);
        }
    }
}