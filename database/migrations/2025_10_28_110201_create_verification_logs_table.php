<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('verification_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practitioner_id')->constrained();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->boolean('is_valid');
            $table->timestamp('verified_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('verification_logs');
    }
};