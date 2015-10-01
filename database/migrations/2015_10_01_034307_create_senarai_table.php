<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenaraiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('containable_id');
            $table->string('containable_type');
            $table->string('container');
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
        Schema::drop('senarai');
    }
}
