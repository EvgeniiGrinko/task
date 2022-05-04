<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ["id", "ru_name", 'group_id'];

    public function equipment(){
        return Equipment::where("group_id", $this->group_id)->get();
     }
     public function car(){
        return $this->belongsToMany(Car::class);
     }
}
