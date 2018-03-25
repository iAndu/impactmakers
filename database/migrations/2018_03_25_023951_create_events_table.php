<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('description');
            $table->dateTime('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_institution_id_foreign');
        });
        Schema::dropIfExists('events');
    }
}
