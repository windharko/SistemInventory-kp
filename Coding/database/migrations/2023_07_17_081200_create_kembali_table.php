<?php

use App\Models\Inventory;
use App\Models\User;
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
        Schema::create('kembalis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sum');
            $table->string('admin');
            $table->integer('kembali');
            $table->integer('hilang');
            $table->integer('rusak');
            $table->dateTime('tanggalKeluar');
            $table->foreignId('inventories_id')->constrained('inventories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kembalis');
    }
};
