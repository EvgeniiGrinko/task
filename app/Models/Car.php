<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ["id", "uin", "dealer", "category", "subcategory", "type", "year", "brand", "model", "generation",
   "bodyConfiguration",
    "modification",
     "complectation",
     "brandComplectationCode",
     "engineType",
     "engineVolume",
     "enginePower",
     "bodyNumber",
     "bodyType",
     "bodyDoorCount",
     "bodyColor",
     "bodyColorMetallic",
     "driveType",
     "gearboxType",
     "gearboxGearCount",
     "steeringWheel",
     "mileage",
     "mileageUnit",
     "price" ,
     "specialOffer" ,
     "specialOfferPreviousPrice" ,
     "tradeinDiscount" ,
     "creditDiscount" ,
     "insuranceDiscount" ,
     "maxDiscount" ,
     "availability" ,
     "ptsType" ,
     "country" ,
     "ecoClass" ,
     "driveWheel" ,
     "axisCount" ,
     "brakeType" ,
     "cabinType" ,
     "maximumPermittedMass" ,
     "saddleHeight" ,
     "cabinSuspension" ,
     "chassisSuspension" ,
     "length" ,
     "width" ,
     "bodyVolume" ,
     "bucketVolume" ,
     "tractionClass" ,
     "refrigeratorClass" ,
     "craneArrowRadius" ,
     "craneArrowLength" ,
     "craneArrowPayload" ,
     "loadHeight" ,
     "photoCount" ,
  "description" ,
     "ownersCount" ,
     "vehicleCondition" ,
    "equipment" ,
     "brandColorCode" ,
     "brandInteriorCode" ,
     "certificationProgram" ,
     "acquisitionSource" ,
     "acquisitionDate" ,
     "manufactureDate"];

     protected $casts = ["uin" => "string", "dealer" => "string", "category" => "string", "subcategory" => "string", "type" => "string", "year" => "int", "brand" => "string", "model" => "string", "generation" => "string",
     "bodyConfiguration" => "string",
      "modification" => "string",
       "complectation" => "string",
       "brandComplectationCode" => "string",
       "engineType" => "string",
       "enginePower" => "int",
       "bodyNumber" => "string",
       "bodyType" => "string",
       "bodyDoorCount" => "int",
       "bodyColor" => "string",
       "bodyColorMetallic"=> "int",
       "driveType"=> "string",
       "gearboxType"=> "string",
       "gearboxGearCount"=> "string",
       "steeringWheel"=> "string",
       "mileage"=> "int",
       "mileageUnit"=> "string",
       "price" => "int",
       "specialOffer" => "int",
       "specialOfferPreviousPrice" => "string",
       "tradeinDiscount" => "string",
       "creditDiscount" => "string",
       "insuranceDiscount" => "string",
       "maxDiscount" => "string",
       "availability" => "string",
       "ptsType" => "string",
       "country" => "string",
       "ecoClass" => "string",
       "driveWheel" => "string",
       "axisCount" => "string",
       "brakeType" => "string",
       "cabinType" => "string",
       "maximumPermittedMass" => "string",
       "operatingTime" => "string",
       "saddleHeight" => "string",
       "cabinSuspension" => "string",
       "chassisSuspension" => "string",
       "length" => "string",
       "width" => "string",
       "bodyVolume" => "string",
       "bucketVolume" => "string",
       "tractionClass" => "string",
       "refrigeratorClass" => "string",
       "craneArrowRadius" => "string",
       "craneArrowLength" => "string",
       "craneArrowPayload" => "string",
       "loadHeight" => "string",
       "photoCount" => "int",
       "ownersCount" => "int",
       "vehicleCondition" => "string",
      "equipment" => "string",
       "brandColorCode" => "string",
       "brandInteriorCode" => "string",
       "certificationProgram" => "string",
       "acquisitionSource" => "string",
       "acquisitionDate" => "datetime",
       "manufactureDate"=> "string"];
     public function groupName($id){
      return Group::where("group_id", $id)->first()->ru_name;
  }

      public function equipment($group_id){
      return CarEquipment::where("car_id", $this->id)->where("group_id", $group_id)->get();
   }
   public function equipmentName($equipment_id)
   {
      return Equipment::where('id', $equipment_id)->get();
   }
   public function carEquipment(){
      return CarEquipment::where("car_id", $this->id)->get();
   }
   public function groups()
   {
      return Group::all();
   }
   public function carGroup(){
     
      return CarGroup::where("car_id", $this->id)->get();
   }
   public function equip()
   {
      return $this->hasManyThrough(Group::class, CarEquipment::class);
   }
}
