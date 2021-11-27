<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParadeStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parade_states', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->date('date');
            $table->string('table_type');
            $table->integer('officer');
            $table->integer('master_warent_officer');
            $table->integer('senior_warent_officer');
            $table->integer('warent_officer');
            $table->integer('sergent');
            $table->integer('corporal');
            $table->integer('lance_corporal');
            $table->integer('soldier');
            $table->integer('clerk');
            $table->integer('cook_u');
            $table->integer('cook_mess');
            $table->integer('trademan');
            $table->integer('nc_e');
            $table->integer('nc_u');
            $table->integer('songjukto');
            $table->integer('rt');
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
        Schema::dropIfExists('parade_states');
    }
}
