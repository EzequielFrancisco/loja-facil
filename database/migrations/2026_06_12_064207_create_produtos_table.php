<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->foreignId('loja_id')->constrained()->onDelete('cascade');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade')->default(0);
            $table->string('categoria', 100)->nullable();
            $table->string('sku', 100)->nullable()->unique();
            $table->text('descricao')->nullable();
            $table->timestamps();
            
            $table->index('loja_id');
            $table->index('categoria');
            $table->index('sku');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};