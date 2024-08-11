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
        Schema::create('conges', function (Blueprint $table) {
            $table->string('numConge')->primary();
            $table->string('numEmp');
            $table->string('motif');
            $table->integer('nbrjr');
            $table->date('dateDemande');

            // ======================= Foreign key ===================
            $table->foreign('numEmp')->references('numEmp')->on('Employes')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
