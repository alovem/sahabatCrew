<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $table = 'vessel';
    protected $primaryKey = 'vessel_id';

    protected $fillable = [
        'vessel_id', 'vessel_name', 'vessel_imo', 'vessel_mmsi', 'vessel_call_sign', 'vessel_year_build'
    ];
}
