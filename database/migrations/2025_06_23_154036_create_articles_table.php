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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->enum('categorie',['homme','femme']);
            $table->double('prix');
            $table->integer('quantite');
            $table->string('photo');
            $table->longText('description');
            $table->enum('taille',['L','M','S','XL','XXL']);
            $table->unsignedBigInteger('type_article_id');
            $table->foreign('type_article_id')->references('id')->on('type_articles')->onDelete('cascade');
            $table->unsignedBigInteger('detail_article_id');
            $table->foreign('detail_article_id')->references('id')->on('type_articles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
