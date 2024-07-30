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
        Schema::create('reportes_volumetricos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_planta')->unsigned();
            $table->json('reporte');
            $table->string('tipo');
            $table->timestamps();
            $table->softDeletes();  
            $table->foreign('id_planta')->references('id')->on('planta_gas')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_volumetricos');
    }
};
