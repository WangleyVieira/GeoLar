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
        Schema::create('property_owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('property_id')->unsigned()->comment('Foreign key to properties table');
            $table->bigInteger('owner_id')->unsigned()->comment('Foreign key to owners table');
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_owners');
    }
};
