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
        Schema::create('defecta_departements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('defecta_id');
            $table->unsignedBigInteger('defecta_details_id');
            $table->unsignedBigInteger('mst_satuan_id');
            $table->integer('needs');
            $table->integer('monthly_used');
            $table->string('auth');
            $table->foreign('defecta_id')->references('id')->on('defectas')->onDelete('cascade');
            $table->foreign('defecta_details_id')->references('id')->on('defecta_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defecta_departements');
    }
};
