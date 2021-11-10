<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


    public function writer() {
        return $this->belongsTo(User::class , 'user');
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
