<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        "title",
        "description",
        "body",
        "url",
    ];
}
