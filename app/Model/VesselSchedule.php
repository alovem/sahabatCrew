<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VesselSchedule extends Model
{
    protected $table = 'vessel_schedule';
    protected $primaryKey = 'schedule_id';

    protected $fillable = [
        'schedule_id', 'vessel_id', 'arrival_date', 'departure_date', 'pol', 'pod'
    ];
}
