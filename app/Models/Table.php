<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guest_number', 'status' , 'location'];

    public function knowReservation(){
        return $this->hasOne(Reservation::class);
        // return $this->hasMany(Reservation::class,'table_id','id');
    }

    // public function getReservationTable(){
    //     return $this->belongsTo(Reservation::class , 'id');
    // }
}
