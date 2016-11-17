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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voteQuestions()
    {
        return $this->hasMany(VoteQuetion::class);
    }

    /**
     * @param $data
     * @return $this
     */
    public function addVoteDetail($data)
    {
        $this->voteDetails()->save(VoteDetail::create($data));
        return $this;
    }

    /**
     * @param $data
     * @return $this
     */
    public function addVoteQuestion($data)
    {
        $this->voteQuestions()->save(VoteQuetion::create($data));
        return $this;
    }

    public static function create(array $options = [])
    {
        $vote = parent::create($options);

        if (array_key_exists('voteDetails', $options)) {
            $vote = $vote->addVoteDetail($options['voteDetails']);
        }
        if (array_key_exists('voteQuestions', $options)) {
            $voteQuestions = $options['voteQuestions'];
            $vote->addVoteQuestion($voteQuestions);
        }
        return $vote;
    }
}
