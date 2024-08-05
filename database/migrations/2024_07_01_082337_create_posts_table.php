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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->unsignedBigInteger("categoty_post_id");
            $table->string("title");
            $table->string("seo_title");
            $table->string("seo_description");
            $table->string("alias");
            $table->string("image");
            $table->longText("description");
            $table->tinyInteger('status')->default(1);

            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('categoty_post_id')->references('id')->on('categoty_posts')->cascadeOnDelete()->cascadeOnUpdate();

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
