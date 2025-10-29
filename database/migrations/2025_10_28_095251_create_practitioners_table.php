<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('full_name');
            $table->string('profile_photo_url')->nullable();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('speciality_id')->constrained();
            $table->foreignId('sub_speciality_id')->nullable()->constrained('sub_specialities');
            $table->date('date_of_registration')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('practitioners');
    }
};