<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id("id");
            $table->string("uin")->nullable();
            $table->string("dealer")->nullable();
            $table->string("category")->nullable();
            $table->string("subcategory")->nullable();
            $table->string("type")->nullable();
            $table->integer("year")->nullable();
            $table->string("brand")->nullable();
            $table->string("model")->nullable();
            $table->string("generation")->nullable();
            $table->string("bodyConfiguration")->nullable();
            $table->string("modification")->nullable();
            $table->string("complectation")->nullable();
            $table->string("brandComplectationCode")->nullable();
            $table->string("engineType")->nullable();
            $table->string("engineVolume")->nullable();
            $table->integer("enginePower")->nullable();
            $table->string("bodyNumber")->nullable();
            $table->string("vin")->nullable();
            $table->string("bodyType")->nullable();
            $table->integer("bodyDoorCount")->nullable();
            $table->string("bodyColor")->nullable();
            $table->integer("bodyColorMetallic")->nullable();
            $table->string("driveType")->nullable();
            $table->string("gearboxType")->nullable();
            $table->string("gearboxGearCount")->nullable();
            $table->string("steeringWheel")->nullable();
            $table->integer("mileage")->nullable();
            $table->string("mileageUnit")->nullable();
            $table->integer("price")->nullable();
            $table->integer("specialOffer")->nullable();
            $table->string("specialOfferPreviousPrice")->nullable();
            $table->string("tradeinDiscount")->nullable();
            $table->string("creditDiscount")->nullable();
            $table->string("insuranceDiscount")->nullable();
            $table->string("maxDiscount")->nullable();
            $table->string("availability")->nullable();
            $table->string("ptsType")->nullable();
            $table->string("country")->nullable();
            $table->string("operatingTime")->nullable();
            $table->string("ecoClass")->nullable();
            $table->string("driveWheel")->nullable();
            $table->string("axisCount")->nullable();
            $table->string("brakeType")->nullable();
            $table->string("cabinType")->nullable();
            $table->string("maximumPermittedMass")->nullable();
            $table->string("saddleHeight")->nullable();
            $table->string("cabinSuspension")->nullable();
            $table->string("chassisSuspension")->nullable();
            $table->string("length")->nullable();
            $table->string("promoFeatures")->nullable();
            $table->string("width")->nullable();
            $table->string("bodyVolume")->nullable();
            $table->string("bucketVolume")->nullable();
            $table->string("tractionClass")->nullable();
            $table->string("refrigeratorClass")->nullable();
            $table->string("craneArrowRadius")->nullable();
            $table->string("craneArrowLength")->nullable();
            $table->string("craneArrowPayload")->nullable();
            $table->string("loadHeight")->nullable();
            $table->integer("photoCount")->nullable();
            $table->text("description")->nullable();
            $table->integer("ownersCount")->nullable();
            $table->string("vehicleCondition")->nullable();
            $table->string("equipment")->nullable();
            $table->string("brandColorCode")->nullable();
            $table->string("brandInteriorCode")->nullable();
            $table->string("certificationProgram")->nullable();
            $table->string("acquisitionSource")->nullable();
            $table->dateTime("acquisitionDate")->nullable();
            $table->string("manufactureDate")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
