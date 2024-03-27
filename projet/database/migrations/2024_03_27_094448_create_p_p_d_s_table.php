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
        Schema::create('p_p_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('weight');
            $table->float('size');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('status')->default(0);
            $table->$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_p_d_s');
    }
};
