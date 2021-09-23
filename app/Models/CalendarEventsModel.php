<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEventsModel extends Model
{
    use HasFactory;

    protected $table = 't_calendar_events';
    public $timestamps = false;
}
