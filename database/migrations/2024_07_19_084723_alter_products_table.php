<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('delivery_Zone')->nullable();
            $table->string('delivery_Street')->nullable();
            $table->string('delivery_BuildingNo')->nullable();
            $table->string('delivery_UnitNo')->nullable();
            $table->string('pickup_Zone')->nullable();
            $table->string('pickup_Street')->nullable();
            $table->string('pickup_Building')->nullable();
            $table->string('pickup_UnitNo')->nullable();
            $table->string('location_Details')->nullable();
            $table->string('destinationCountry')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('zipCode')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
