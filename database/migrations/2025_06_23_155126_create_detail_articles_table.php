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
        Schema::create('detail_articles', function (Blueprint $table) {
            $table->id();
            $table->enum('taille',['L','M','XL']);
            $table->enum('couleur',['rouge','vert','bleu','blanc','gris']);
            $table->unsignedBigInteger("Article_id")->nullable();
            $table->foreign("Article_id")->references("id")->on("Articles")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_articles');
    }
};
