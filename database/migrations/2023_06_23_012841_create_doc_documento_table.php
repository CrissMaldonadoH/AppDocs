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
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->id();
            $table->string('DOC_NOMBRE');
            $table->string('DOC_CODIGO');
            $table->string('DOC_CONTENIDO');
            $table->foreignId('DOC_ID_TIPO')->constrained('tip_tipo_doc')->onDelete('cascade');
            $table->foreignId('DOC_ID_PROCESO')->constrained('pro_proceso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
