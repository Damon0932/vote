<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @mixin \Eloquent
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_url',
        'name',
        'question'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }


    /**
     * @var array
     */
    protected $appends = ['answer', 'comment'];

    /**
     * @return mixed
     */
    public function getAnswerAttribute() {
        return 0;
    }

    /**
     * @return mixed
     */
    public function getCommentAttribute() {
        return '';
    }
}
