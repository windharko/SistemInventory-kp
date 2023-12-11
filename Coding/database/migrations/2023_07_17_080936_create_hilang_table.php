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
        Schema::create('hilangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sum');
            $table->integer('hilang');
            $table->string('admin');
            $table->dateTime('tanggalKeluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hilang');
    }
};
