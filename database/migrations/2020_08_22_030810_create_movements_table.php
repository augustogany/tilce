<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->decimal('ammount',8,2);
            $table->timestamps();
            $table->foreignId('box_id')
                  ->constrained();
            $table->foreignId('user_id')
                  ->constrained();
            $table->unsignedBigInteger('type_movement_id');
            $table->foreign('type_movement_id')->references('id')->on('type_movements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
