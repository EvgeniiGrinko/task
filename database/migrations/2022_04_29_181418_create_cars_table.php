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
            $table->text("uin")->nullable();
            $table->text("dealer")->nullable();
            $table->text("category")->nullable();
            $table->text("subcategory")->nullable();
            $table->text("type")->nullable();
            $table->text("year")->nullable();
            $table->text("brand")->nullable();
            $table->text("model")->nullable();
            $table->text("generation")->nullable();
            $table->text("bodyConfiguration")->nullable();
            $table->text("modification")->nullable();
            $table->text("complectation")->nullable();
            $table->text("brandComplectationCode")->nullable();
            $table->text("engineType")->nullable();
            $table->text("engineVolume")->nullable();
            $table->text("enginePower")->nullable();
            $table->text("bodyNumber")->nullable();
            $table->text("vin")->nullable();
            $table->text("bodyType")->nullable();
            $table->text("bodyDoorCount")->nullable();
            $table->text("bodyColor")->nullable();
            $table->text("bodyColorMetallic")->nullable();
            $table->text("driveType")->nullable();
            $table->text("gearboxType")->nullable();
            $table->text("gearboxGearCount")->nullable();
            $table->text("steeringWheel")->nullable();
            $table->text("mileage")->nullable();
            $table->text("mileageUnit")->nullable();
            $table->text("price")->nullable();
            $table->text("specialOffer")->nullable();
            $table->text("specialOfferPreviousPrice")->nullable();
            $table->text("tradeinDiscount")->nullable();
            $table->text("creditDiscount")->nullable();
            $table->text("insuranceDiscount")->nullable();
            $table->text("maxDiscount")->nullable();
            $table->text("availability")->nullable();
            $table->text("ptsType")->nullable();
            $table->text("country")->nullable();
            $table->text("operatingTime")->nullable();
            $table->text("ecoClass")->nullable();
            $table->text("driveWheel")->nullable();
            $table->text("axisCount")->nullable();
            $table->text("brakeType")->nullable();
            $table->text("cabinType")->nullable();
            $table->text("maximumPermittedMass")->nullable();
            $table->text("saddleHeight")->nullable();
            $table->text("cabinSuspension")->nullable();
            $table->text("chassisSuspension")->nullable();
            $table->text("length")->nullable();
            $table->text("promoFeatures")->nullable();
            $table->text("width")->nullable();
            $table->text("bodyVolume")->nullable();
            $table->text("bucketVolume")->nullable();
            $table->text("tractionClass")->nullable();
            $table->text("refrigeratorClass")->nullable();
            $table->text("craneArrowRadius")->nullable();
            $table->text("craneArrowLength")->nullable();
            $table->text("craneArrowPayload")->nullable();
            $table->text("loadHeight")->nullable();
            $table->text("photoCount")->nullable();
            $table->text("description")->nullable();
            $table->text("ownersCount")->nullable();
            $table->text("vehicleCondition")->nullable();
            $table->text("equipment")->nullable();
            $table->text("brandColorCode")->nullable();
            $table->text("brandInteriorCode")->nullable();
            $table->text("certificationProgram")->nullable();
            $table->text("acquisitionSource")->nullable();
            $table->text("acquisitionDate")->nullable();
            $table->text("manufactureDate")->nullable();
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
