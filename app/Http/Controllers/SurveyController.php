<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::where('user_id', Auth::id())->get();
        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = Auth::id();
        
        // Create the survey using the Survey model directly
        Survey::create($validated);

        return redirect()->route('surveys.index')->with('success', 'Survey created successfully!');
    }

    public function show(Survey $survey)
    {
        $this->authorize('view', $survey);
        return view('surveys.show', compact('survey'));
    }

    public function destroy(Survey $survey)
    {
        $this->authorize('delete', $survey);
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted successfully!');
    }
}