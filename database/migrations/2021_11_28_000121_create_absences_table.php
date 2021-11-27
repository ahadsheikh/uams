<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->date('date');
            $table->integer('yearly');
            $table->integer('temporary');
            $table->integer('entertainment');
            $table->integer('doctoral');
            $table->integer('joining');
            $table->integer('weekly');
            $table->integer('course');
            $table->integer('cadre');
            $table->integer('join');
            $table->integer('command');
            $table->integer('hospital');
            $table->integer('osl');
            $table->integer('awl');
            $table->integer('dimb');
            $table->integer('accommodation');
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
        Schema::dropIfExists('absences');
    }
}
