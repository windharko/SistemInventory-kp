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
        Schema::create('outs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sum');
            $table->string('admin');
            $table->foreignId('inventories_id')->constrained('inventories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outs');
    }
};
