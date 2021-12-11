<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizQuestions;
use DateTime;

class QuizController extends Controller
{
    public function index() {
        $list = Quiz::all();
        return view('list', ['list'=>$list]);
    }

    public function show($id) {
        $quiz = Quiz::with('quizQuestions')->where(['id' => $id])->first();
        return view('quiz', ['quiz'=>$quiz]);
    }

    public function published() {
        $quizes = Quiz::with('quizQuestions')->get()->toArray();
        foreach ($quizes as $i => $quiz) {
            $quizes[$i]['firstQuestionId'] = 0;
            $maxScore = 0;
            if (!empty($quiz['quiz_questions'])) {
                $quizes[$i]['firstQuestionId'] = array_shift($quiz['quiz_questions'])['id'];
            }
            foreach ($quiz['quiz_questions'] as $q) {
                $maxScore += $q['score'];
            }
            $quizes[$i]['maxScore'] = $maxScore;
        }
        
        return view('published', ['quizes' => $quizes]);

    }
    public function add_quiz(Request $request){
        $quiz = Quiz::create(['name' => $request->name, 'status' => Quiz::STATUS_READY, 'created' => new DateTime()]);
        $quiz->save();
        $id = $quiz->id;
        return redirect("/admin/quiz/$id");
    }

    public function delete_quiz($id) {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect('/admin');
    }
    public function change_status($id){
        $quiz = Quiz::find($id);
        $quiz->status = Quiz::STATUS_READY == $quiz->status ? Quiz::STATUS_PUBLISHED : Quiz::STATUS_READY;
        $quiz->save();
        return redirect('/admin');
    }
}