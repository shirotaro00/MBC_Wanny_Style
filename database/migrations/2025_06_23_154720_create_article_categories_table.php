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
            $table->unsignedBigInteger("Article_id")->nullable();
            $table->foreign("Article_id")->references("id")->on("Articles")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("TypeArticle_id")->nullable();
            $table->foreign("TypeArticle_id")->references("id")->on("TypeArticles")->onDelete("cascade")->onUpdate("cascade");
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
