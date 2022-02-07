<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->char('username',50);
            $table->integer('fivestars')->default(0);
            $table->integer('fourstars')->default(0);
            $table->integer('threestars')->default(0);
            $table->integer('twostars')->default(0);
            $table->integer('onestar')->default(0);
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
        Schema::dropIfExists('ratings');
    }
}
