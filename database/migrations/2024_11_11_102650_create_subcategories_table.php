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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();         // Subcategory name
            $table->string('slug')->unique();         // URL-friendly version of the name
            $table->text('description')->nullable();  // Optional description
            $table->string('image')->nullable();      // Optional image
            $table->foreignId('category_id')          // Link to parent category
                  ->constrained('categories')
                  ->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
