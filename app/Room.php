<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    # characteristics of a room that can be filled in
    protected $fillable = [
        'title',
        'description',
        'size',
        'price',
        'type',
        'zip_code',
        'number',
        'owner_id'
    ];

    /**
     * A room has one owner, an owner can have many rooms
     *
     * @return user collection
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
