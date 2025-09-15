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
        Schema::create('geographic_coordinates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->bigInteger('property_id')->unsigned()->nullable()->comment('Foreign key to property table');
            $table->foreign('property_id')->references('id')->on('geographic_coordinates');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geographic_coordinates');
    }
};
