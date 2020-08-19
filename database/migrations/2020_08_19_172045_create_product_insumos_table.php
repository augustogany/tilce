<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_insumos', function (Blueprint $table) {
            $table->id();
            $table->decimal('cantidad',8,2);
            $table->foreignId('type_id')->constrained();
            $table->foreignId('insumo_id')->constrained();
            $table->unsignedBigInteger('prepared_product_id');
            $table->foreign('prepared_product_id')->references('id')->on('prepared_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_insumos');
    }
}
