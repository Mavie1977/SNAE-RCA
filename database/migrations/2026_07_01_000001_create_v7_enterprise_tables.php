<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 80)->unique();
            $table->string('nom', 191);
            $table->string('icone', 80)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('demarches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('themes')->cascadeOnDelete();
            $table->unsignedBigInteger('ministere_id')->nullable();
            $table->string('nom', 191);
            $table->text('description')->nullable();
            $table->decimal('cout', 12, 2)->default(0);
            $table->string('delai_traitement', 100)->nullable();
            $table->boolean('paiement_obligatoire')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_id')->nullable();
            $table->unsignedBigInteger('citoyen_id')->nullable();
            $table->decimal('montant', 12, 2)->default(0);
            $table->string('moyen_paiement', 80);
            $table->string('reference_transaction', 120)->unique();
            $table->string('statut', 50)->default('en_attente');
            $table->timestamp('date_paiement')->nullable();
            $table->timestamps();
        });

        Schema::create('manager_indicateurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ministere_id')->nullable();
            $table->integer('demandes_recues')->default(0);
            $table->integer('demandes_traitees')->default(0);
            $table->integer('demandes_retard')->default(0);
            $table->decimal('recettes', 14, 2)->default(0);
            $table->decimal('delai_moyen', 8, 2)->default(0);
            $table->date('periode')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manager_indicateurs');
        Schema::dropIfExists('paiements');
        Schema::dropIfExists('demarches');
        Schema::dropIfExists('themes');
    }
};
