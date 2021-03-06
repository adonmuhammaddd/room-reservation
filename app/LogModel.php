<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = 'tbl_log';

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
