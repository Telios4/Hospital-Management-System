<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_sync_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('records_processed');
            $table->string('source_url');
            $table->timestamp('synced_at');
            $table->text('errors')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_sync_logs');
    }
};