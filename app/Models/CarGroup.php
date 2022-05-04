<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CarGroup extends Pivot
{
    protected $fillable = ['id', 'car_id', 'group_id'];
    public function car()
    {
        return $this->belongsTo(Car::class);        
    }
    public function group()
    {
        return $this->belongsTo(Equipment::class);        
    }
    public function carEquipment(){
        return $this->hasMany(CarEquipment::class);
     }
}
