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
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->nullable(); // e.g., 12.50
            $table->decimal('old_price', 10, 2)->nullable();
            $table->string('currency', 3)->default('AZN'); // ISO 4217 code
            $table->string('sku')->nullable();
            $table->unsignedInteger('stock')->default(1);
            $table->json('images')->nullable(); // ["/storage/p1.jpg", ...]
            $table->json('ingredients')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->softDeletes();
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
