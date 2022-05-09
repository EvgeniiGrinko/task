<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = ["id", "group_id", "ru_name"];
  
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function car(){
        return $this->belongsToMany(Car::class)->using(CarEquipment::class);
     }
}
