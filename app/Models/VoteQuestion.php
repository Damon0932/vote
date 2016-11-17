<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoteQuestion
 * @package App\Models
 * @mixin \Eloquent
 */
class VoteQuetion extends Model
{
    /**
     * @var string
     */
    protected $table = 'vote_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer',
        'question',
        'type',
        'vote_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }
}
