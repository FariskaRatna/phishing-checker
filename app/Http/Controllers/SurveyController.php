<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age_range' => 'required|string',
            'q1' => 'required|integer|between:1,5',
            'q2' => 'required|integer|between:1,5',
            'q3' => 'required|integer|between:1,5',
            'q4' => 'required|integer|between:1,5',
            'q5' => 'required|integer|between:1,5',
            'feedback' => 'nullable|string',
        ]);

        Survey::create($validated);

        return redirect()->back()->with('success', 'Terima kasih telah mengisi survei!');
    }
}
