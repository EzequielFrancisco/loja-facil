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
        Schema::create('lojas', function (Blueprint $table) {
            $table->id();
            
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('nif', 20)->unique();
            $table->string('telefone', 20)->nullable();
            $table->text('endereco')->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('pais', 50)->default('Angola');
            
            $table->text('descricao')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->boolean('ativo')->default(true);
            

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('nome');
            $table->index('nif');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lojas');
    }
};