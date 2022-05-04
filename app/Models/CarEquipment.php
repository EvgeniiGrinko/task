<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CarEquipment extends Pivot
{
    protected $fillable = ['group_id','car_id', 'equipment_id'];

    public function car()
    {
        return $this->belongsToMany(Car::class);        
    }
    public function eqipment()
    {
        return $this->belongsToMany(Equipment::class);        
    }
    public function group()
    {
        return $this->belongsTo(Group::class);        
    }
    public function carGroup(){
        return $this->hasMany(CarGroup::class);
     }
}
