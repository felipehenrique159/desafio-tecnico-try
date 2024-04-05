<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_vendedor');
            $table->decimal('comissao', 8, 2);
            $table->decimal('valor_da_venda', 8, 2);
            $table->dateTime('data_da_venda');

            $table->foreign('id_vendedor')
                ->references('id')
                ->on('vendedor')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
