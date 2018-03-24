<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\FeedbackRating;

class FeedbacksController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();

        foreach ($feedbacks as $feedback)
        {
            $feedback->rating = $feedback->positiveRatings()->count() - 
                $feedback->negativeRatings()->count();
        }

        $feedbacks->orderByDesc('rating');

        return response()->json([
            'feedbacks' => $feedbacks
        ]);
    }

    public function store(Request $request)
    {
        $feedback = Feedback::create([
            'user_id' => Auth::id(),
            'institution_id' => $request->institution_id,
            'feedback' => $request->feedback,
        ]);

        return response()->json([
            'status' => 'success',
            'feedback' => $feedback
        ]);
    }

    public function rate(Request $request, Feedback $feedback)
    {
        FeedbackRating::create([
            'user_id' => Auth::id(),
            'feedback_id' => $feedback->id,
            'rating' => $request->rating
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
