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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->string('price');
            $table->string('bathn');
            $table->string('bedn');
            $table->string('area');
            $table->string('location')->nullable();
            $table->tinyInteger('rent')->default(0);
            $table->tinyInteger('sell')->default(0);
            $table->boolean('published')->nullable();
            $table->string('image',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
