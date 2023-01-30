<?php

namespace App\Models;

use App\Models\User;
use App\Models\Table;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    public $sortable = ['res_date', 'created_at', 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function getCategory(){
    //     return $this->hasOne(Category::class , 'id');
    // }

    // public function getTable(){
    //     return $this->hasOne(Table::class , 'id');
    // }

    // public function getUser(){
    //     return $this->hasOne(User::class , 'id');
    // }
}
