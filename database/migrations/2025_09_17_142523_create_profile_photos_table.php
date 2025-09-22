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
        Schema::create('profile_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_original');
            $table->text('name_hash');

            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->uuid('registered_by_user')->nullable();
            $table->foreign('registered_by_user')->references('id')->on('users');
            $table->uuid('inactivated_by_user')->nullable();
            $table->foreign('inactivated_by_user')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_photos');
    }
};
