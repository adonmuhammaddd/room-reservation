<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = 'tbl_room';

    protected $fillable = [
        'roomName',
        'description',
        'capacity',
        'color',
        'isActive',
        'isDeleted',
        'unallocated'
    ];
}
