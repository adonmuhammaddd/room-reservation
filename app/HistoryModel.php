<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    private $table = 'tbl_history';

    protected $fillable = [
        'division',
        'userId',
        'bookingId',
        'startDate',
        'endDate',
        'priority',
        'email',
        'phone',
        'division',
        'position',
        'description'
    ];
}