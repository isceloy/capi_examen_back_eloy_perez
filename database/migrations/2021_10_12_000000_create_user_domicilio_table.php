<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_domicilio', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('domicilio',255)->nullable(true)->default('');
            $table->smallInteger('numero_exterior')->default('0');
            $table->string('colonia',150)->nullable(true)->default('');
            $table->smallInteger('cp')->default('0');
            $table->string('ciudad', 100)->nullable(true)->default('');
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
        Schema::dropIfExists('user_domicilio');
    }
}
