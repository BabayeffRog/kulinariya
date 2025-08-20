<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();

            // Əsas
            $table->string('title', 180);
            $table->string('slug', 200)->unique();
            $table->string('image')->nullable();

            // Resept məlumatları
            $table->unsignedSmallInteger('servings')->nullable();       // nəfər
            $table->string('prep_time')->nullable();  // dəqiqə
            $table->string('cook_time')->nullable();  // dəqiqə
            $table->unsignedSmallInteger('calories')->nullable();
            $table->string('difficulty', 20)->nullable();               // "Asan/Orta/Çətin" - enum yerinə string

            // Mətnlər
            $table->longText('instructions')->nullable();

            // Hamısı bu cədvəldə (JSON sahələr)
            $table->json('ingredients')->nullable();   // ["Un 600 qr","Yumurta 3 ədəd", ...]
            $table->json('categories')->nullable();    // ["Şirniyyat","Börək"]
            $table->json('tags')->nullable();          // opsional
            $table->json('media')->nullable();         // opsional
            $table->string('author')->nullable();

            // SEO
            $table->string('meta_title', 180)->nullable();
            $table->string('meta_description', 255)->nullable();

            // Analitika
            $table->unsignedBigInteger('views_count')->default(0);

            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
