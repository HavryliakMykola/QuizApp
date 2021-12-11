<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $quiz_id
 * @property integer $quiz_question_id
 * @property int $answer
 * @property boolean $is_correct
 * @property string $created
 * @property Quiz $quiz
 * @property QuizQuestion $quizQuestion
 */
class QuizResults extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quiz_results';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['quiz_id', 'quiz_question_id', 'answer', 'is_correct', 'created'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizQuestion()
    {
        return $this->belongsTo('App\QuizQuestion');
    }
}
