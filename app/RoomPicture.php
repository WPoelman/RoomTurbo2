<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomPicture extends Model
{
    protected $fillable = [
        'room_id',
        'filename'
    ];

    /**
     * A picture belongs to one room, a room can have many pictures.
     *
     * @return product collection
     */
    public function product()
    {
        return $this->belongsTo('App\Room');
    }
}
