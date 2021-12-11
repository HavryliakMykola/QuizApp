<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $quiz_id
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property int $correctAnswer
 * @property string $created
 * @property int $score
 * @property Quiz $quiz
 * @property QuizResult[] $quizResults
 */
class QuizQuestions extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quiz_questions';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['quiz_id', 'question', 'answer1', 'answer2', 'answer3', 'answer4', 'correctAnswer', 'created', 'score'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizResults()
    {
        return $this->hasMany('App\Models\QuizResult');
    }
}
