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
}
