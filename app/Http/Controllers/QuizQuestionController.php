<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestions;
use App\Models\QuizResults;
use DateTime;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function show() {
        return view('question');
    }

    public function add_question(Request $request, $id){
     $quiz_questions = QuizQuestions::create([
            'question'=> $request->question,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2, 
            'answer3' => $request->answer3, 
            'answer4' => $request->answer4, 
            'correctAnswer' => $request->correctAnswer,
            'score' => $request->score,
            'quiz_id' => $id,
            'created'=> new DateTime(),
        ]);
        $quiz_questions->save();
        return redirect("/admin/quiz/$id");
    }

    public function question($id) {
        $question = QuizQuestions::where(['id' => $id])->first();
        return view('questions', ['question' => $question]);
    }

    public function answer(Request $request, $id) {
        $question = QuizQuestions::with(['quiz', 'quiz.quizQuestions'])->where(['id' => $id])->first();
        $quizResults = QuizResults::create([
            'answer' => $request->answer,
            'is_correct' => (integer) $request->answer === $question->correctAnswer,
            'created' => new DateTime(),
            'quiz_id' => $question->quiz->id,
            'quiz_question_id' => $id,
        ]);
        $nextQuestions = [];
        $nextQuestionId = NULL;
        $ignore = true;
        foreach ($question->quiz->quizQuestions->toArray() as $index => $q) {            
            if ($q['id'] != $id && !$ignore) {
                $nextQuestions[] = $q;
            }

            if ($q['id'] == $id) {
                $ignore = false;
            }
            
        }
        if (!empty($nextQuestions)) {
            $nextQuestionId = $nextQuestions[0]['id'];
        }

        $quizResults->save();

        return redirect($nextQuestionId ? "/app/take/$nextQuestionId" : "/app/result/" . $question->quiz->id);
    }
}
