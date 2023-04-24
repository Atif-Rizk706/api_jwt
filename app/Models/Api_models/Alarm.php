<?php

namespace App\Models\Api_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{
    use HasFactory;
    protected $table='alarms';
    protected $fillable=[
        'id', 'user_id','content','alarm_date','alarm_time'
    ];
    public function blind(){
        return $this->belongsTo(Blind::class);
    }
}
