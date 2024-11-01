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
        Schema::create('defectas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Pastikan tipe data unsignedBigInteger
            $table->string('defecta_name');
            $table->date('demand_date');
            $table->unsignedInteger('month');
            $table->unsignedInteger('year');
            $table->unsignedBigInteger('warehouse_id'); // Pastikan tipe data unsignedBigInteger
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Nama tabel diperbaiki ke `users`
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade'); // Nama tabel diperbaiki ke `warehouses`
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defectas');
    }
};
