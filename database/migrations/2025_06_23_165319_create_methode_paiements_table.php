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
        Schema::create('methode_paiements', function (Blueprint $table) {
            $table->id();
            $table->string('telephone');
            $table->boolean('efface');
            $table->unsignedBigInteger("type_paiement_id")->nullable();
            $table->foreign("type_paiement_id")->references("id")->on("type_paiements")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('methode_paiements');
    }
};
