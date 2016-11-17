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
        'job'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voteDetails()
    {
        return $this->hasMany(VoteDetail::class);
    }

    public function addVoteDetail($data)
    {
        $this->voteDetails()->save(VoteDetail::create($data));
        return $this;
    }
}
