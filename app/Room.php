<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'description',
        'size',
        'price',
        'type',
        'zip_code',
        'number',
        'owner'
    ];
}
