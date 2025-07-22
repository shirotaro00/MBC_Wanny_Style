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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->double('montant');
            $table->string('Ref_paiement')->unique();
            $table->date('date_paiement');
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("commande_id")->nullable();
            $table->foreign("commande_id")->references("id")->on("commandes")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("methode_paiement_id")->nullable();
            $table->foreign("methode_paiement_id")->references("id")->on("methode_paiements")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
