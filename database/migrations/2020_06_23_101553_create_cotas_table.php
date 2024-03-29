<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sorteio');
            $table->string('number');
            $table->string('status')->default('livre');
            $table->integer('id_lead')->nullable();
            $table->timestamp('time_compra')->nullable();
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
        Schema::dropIfExists('cotas');
    }
}
