<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "title",
        "body",
    ];
}
