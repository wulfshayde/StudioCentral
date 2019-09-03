<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studio_bands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('studio_id');
            $table->unsignedBigInteger('band_id');
            $table->string('roles');
            $table->timestamps();

            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('band_id')->references('id')->on('bands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studio_bands');
    }
}
