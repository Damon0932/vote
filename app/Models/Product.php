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
    protected $appends = ['answer', 'comment', 'questions'];

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

    /**
     * @return array
     */
    public function getQuestionsAttribute() {
        $questions = [
            '如果这件衣服'.$this->attributes['price'].'元一件(套），请问您愿意买这件衣服吗？',
            '请问您对这款衣服的款式评价如何？',
            '请问您对这款衣服的颜色评价如何？',
            '对于这款衣服，您觉得哪里最能打动你？（选填）？',
            '对于这款衣服，您举得哪里还不够好？（选填）'
        ];
        if($this->attributes['category'] == '文胸') {
            array_push($questions, '请问您对这款文胸的功能评价如何？');
        } else {
            array_push($questions, '请问您对这款家居服的面料评价如何？');
        }
        return $questions;
    }
}
