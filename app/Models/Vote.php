<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * @package App\Models
 * @mixin \Eloquent
 */
class Vote extends Model
{
    /**
     * @var string
     */
    protected $table = 'votes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'age',
        'job',
        'category'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voteDetails()
    {
        return $this->hasMany(VoteDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voteQuestions()
    {
        return $this->hasMany(VoteQuestion::class);
    }
}
