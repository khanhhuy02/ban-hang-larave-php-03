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
            $table->float('price_new')->nullable();
            $table->float('price_old')->nullable();
            $table->string('image',255)->nullable();
            $table->string('sub_image')->nullable();
            $table->string('screen',255)->nullable();
            $table->string('operating_system',255)->nullable();
            $table->string('camera_before',255)->nullable();
            $table->string('camera_after',255)->nullable();
            $table->string('chip',255);
            $table->string('ram',255);
            $table->string('capacity',255)->nullable();
            $table->string('pin',255)->nullable();
            $table->string('sim',255)->nullable();
            $table->integer('quantity')->nullable();
            $table->date('meeting_day',255)->nullable();
            $table->tinyInteger('hidden')->default(1);
            $table->text('description')->nullable();
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
