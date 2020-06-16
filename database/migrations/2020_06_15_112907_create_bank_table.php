<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('holder');
            $table->string('holder_active');
            $table->string('cpf');
            $table->string('cpf_active');
            $table->string('agency')->nullable();
            $table->string('agency_active')->nullable();
            $table->string('account')->nullable();
            $table->string('account_active')->nullable();
            $table->string('type_id')->nullable();
            $table->string('type_active')->nullable();
            $table->string('active');
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
        Schema::dropIfExists('bank');
    }
}
