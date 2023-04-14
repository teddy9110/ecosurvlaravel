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
        Schema::create('parkable', function (Blueprint $table) {
            $table->id();
            $table->string('breed_id');
            $table->string('park_id');
        });
        
        Schema::create('breedable', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('breed_id');
        });
        
        Schema::create('userable', function (Blueprint $table) {
            $table->id();
            $table->string('park_id');
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkable');
        Schema::dropIfExists('breedable');
        Schema::dropIfExists('userable');
    }
};
