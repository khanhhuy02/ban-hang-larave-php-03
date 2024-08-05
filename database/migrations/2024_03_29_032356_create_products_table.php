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
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('brands_id');
            $table->string('name',255)->nullable();
            $table->string('alias_sp',255)->nullable();
            $table->double('price_new')->nullable();
            $table->double('price_old')->nullable();
            $table->string('image',255)->nullable();
            $table->longText('sub_image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->longText('description')->nullable();
            $table->longText('information_engineering')->nullable();
            $table->timestamps();


            $table->foreign('categories_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('brands_id')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
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
