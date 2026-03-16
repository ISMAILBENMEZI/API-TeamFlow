<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskTimer extends Model
{
    protected $fillable = [
        'task_id',
        'user_id',
        'start_time',
        'end_time',
    ];
}
