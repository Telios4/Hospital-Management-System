<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practitioner_id')->constrained();
            $table->foreignId('degree_id')->constrained();
            $table->foreignId('institution_id')->constrained();
            $table->string('specialization')->nullable();
            $table->smallInteger('year_awarded')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
};