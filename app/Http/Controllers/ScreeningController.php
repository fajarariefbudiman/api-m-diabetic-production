<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningQuestion;
use App\Models\ScreeningAnswer;
use App\Models\ScreeningSession;
use Illuminate\Support\Facades\Auth;

class ScreeningController extends Controller
{
    public function questions()
    {
        return ScreeningQuestion::all();
    }

    public function show($id)
    {
        $session = ScreeningSession::with('answers')->findOrFail($id);
        if ($session->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return response()->json($session);
    }

    public function submitAnswers(Request $request)
    {
        $request->validate([
            '*.question_id' => 'required|exists:screening_questions,id',
            '*.answer' => 'required|string'
        ]);

        $user = Auth::user();
        $answers = $request->all();
        $score = 0;

        foreach ($answers as $answer) {
            $question = ScreeningQuestion::find($answer['question_id']);
            if ($question && strtolower($answer['answer']) === 'ya') {
                $score += $question->weight;
            }
        }

        $risk = ScreeningSession::evaluateRisk($score);

        $session = ScreeningSession::where('user_id', $user->id)->latest()->first();
        if ($session) {
            $session->update(array_merge(['score' => $score], $risk));
            $session->answers()->delete();
        } else {
            $session = ScreeningSession::create(array_merge([
                'user_id' => $user->id,
                'score' => $score
            ], $risk));
        }

        foreach ($answers as $answer) {
            ScreeningAnswer::create([
                'session_id' => $session->id,
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer']
            ]);
        }

        return response()->json($session->load('answers'), 201);
    }
}
