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
        Schema::create('defecta_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('defecta_id');
            $table->unsignedBigInteger('asset_master_id');
            $table->unsignedBigInteger('mst_satuan_id');
            $table->integer('satuan');
            $table->integer('actual');
            $table->integer('needs');
            $table->unsignedBigInteger('monthly');
            $table->foreign('defecta_id')->references('id')->on('defectas')->onDelete('cascade');
            $table->foreign('asset_master_id')->references('id')->on('asset_masters')->onDelete('cascade');
            $table->foreign('mst_satuan_id')->references('id')->on('mst_satuans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defecta_details');
    }
};
