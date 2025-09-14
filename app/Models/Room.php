<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
       use HasFactory;
    //
    protected $table ='rooms';

     protected $primaryKey = 'room_id';
     protected $guarded =[];

     public function reservations()
{
    return $this->hasMany(Reservations::class, 'room_id');
}

}
