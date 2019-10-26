<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        "title",
        "location",
        "start_date",
        "start_time",
        "end_date",
        "end_time",
        "description",
    ];
}
