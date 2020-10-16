<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRoomModel extends Model
{
    protected $table = 'tbl_bookingroom';

    protected $fillable = [
        'division',
        'userId',
        'startDate',
        'endDate',
        'description',
        'priority',
        'note',
        'roomName',
        'countPerson',
        'date',
        'urgency',
        'isActive',
        'isDeleted'
    ];
}
