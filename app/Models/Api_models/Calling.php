<?php

namespace App\Models\Api_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calling extends Model
{
    use HasFactory;
    protected $table='callings';
    protected $fillable=[
        'id', 'user_id','name','phone_number'
    ];
    public function blind(){
        return $this->belongsTo(Blind::class);
    }
}
