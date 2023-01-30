<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'tables_number'];

    public function knowReservation(){
        return $this->hasOne(Reservation::class);
        // return $this->hasMany(Reservation::class,'category_id','id');

    }

    // public function getReservationCategory(){
    //     return $this->belongsToMany(Reservation::class , 'category');
    // }

}
