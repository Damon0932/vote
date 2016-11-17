<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoteDetail
 * @package App\Models
 * @mixin \Eloquent
 */
class VoteDetail extends Model
{
    /**
     * @var string
     */
    protected $table = 'vote_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer',
        'question',
        'type',
        'product_id',
        'vote_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vote()
    {
        return $this->belongsTo(Vote::class, 'vote_id');
    }
}
