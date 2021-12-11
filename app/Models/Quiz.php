<?php

namespace App\Models;

use App\Models\QuizQuestions;
use App\Models\QuizResults;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $status
 * @property string $created
 * @property QuizQuestion[] $quizQuestions
 * @property QuizResult[] $quizResults
 */
class Quiz extends Model
{

    const STATUS_READY = 'ready';
    const STATUS_PUBLISHED = 'published';
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quizzes';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'status', 'created'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizQuestions()
    {
        return $this->hasMany(QuizQuestions::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizResults()
    {
        return $this->hasMany(QuizResults::class);
    }
    
    public function status(){
        return static::where('status', 'published')->get();
    }
}
