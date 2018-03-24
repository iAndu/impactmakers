<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('institution_id')->unsigned();
            $table->text('feedback');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
                
            $table->foreign('institution_id')->references('id')->on('institutions')
                ->onDelete('cascade')
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
        Schema::table('feedbacks', function(Blueprint $table) {
            $table->dropForeign('feedbacks_user_id_foreign');
			$table->dropForeign('feedbacks_institution_id_foreign');            
        });
        
        Schema::drop('feedbacks');
    }
}
