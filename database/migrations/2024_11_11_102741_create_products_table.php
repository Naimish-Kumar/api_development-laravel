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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();

            // Foreign keys for categories and subcategories
            $table->foreignId('category_id')          // Link to main category
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('set null');

            $table->foreignId('subcategory_id')       // Link to subcategory, if applicable
                  ->nullable()
                  ->constrained('subcategories')
                  ->onDelete('set null');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};