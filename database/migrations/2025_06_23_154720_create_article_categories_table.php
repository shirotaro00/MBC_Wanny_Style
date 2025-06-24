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
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("article_id")->nullable();
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("type_article_id")->nullable();
            $table->foreign("type_article_id")->references("id")->on("type_articles")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_categories');
    }
};
