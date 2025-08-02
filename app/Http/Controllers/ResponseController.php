<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function create(Survey $survey)
    {
        return view('responses.create', compact('survey'));
    }

    public function store(Request $request, Survey $survey)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        $survey->responses()->create($validated);

        return redirect()->route('responses.thankyou');
    }

    public function thankyou()
    {
        return view('responses.thankyou');
    }

    public function index(Survey $survey)
    {
        $this->authorize('view', $survey);
        $responses = $survey->responses()->latest()->get();
        return view('responses.index', compact('survey', 'responses'));
    }
}