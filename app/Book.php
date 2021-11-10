<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    //protected $with = ['publisher' , 'category'];

    public function publisher() {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

}
