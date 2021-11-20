<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzahousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzahouses', function (Blueprint $table) {
            $table->id();
            $table->string('type',30);
            $table->string('base',30);
            $table->string('name',30);
            $table->string('city',20);
            $table->string('phone',10);
            $table->decimal('price',8,2);
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('pizzahouses');
    }
}
