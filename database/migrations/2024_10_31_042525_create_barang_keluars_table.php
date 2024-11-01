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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('defecta_details_id');
            $table->unsignedBigInteger('stock');
            $table->unsignedBigInteger('supplier_id');
            $table->date('exit_date');
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->string('information');
            $table->foreign('defecta_details_id')->references('id')->on('defecta_details')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
