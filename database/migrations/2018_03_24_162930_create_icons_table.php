<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('path');
        });

        Schema::table('institution_types', function (Blueprint $table) {
            $table->integer('icon_id')->unsigned();
            $table->foreign('icon_id')->references('id')->on('icons')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institution_types', function(Blueprint $table) {
            $table->dropForeign('institution_types_icon_id_foreign');
            $table->dropColumn('icon_id');            
        });

        Schema::drop('icons');
    }

}