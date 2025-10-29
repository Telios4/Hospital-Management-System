<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('practitioner_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practitioner_id')->constrained();
            $table->string('document_type'); // degree, certificate, id, license
            $table->string('file_path');
            $table->date('uploaded_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('practitioner_documents');
    }
};