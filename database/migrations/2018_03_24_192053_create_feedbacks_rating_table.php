<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('feedback_id')->unsigned();
            $table->enum('rating', [-1, 1]);
        });

        Schema::table('feedbacks_rating', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('feedback_id')->references('id')->on('feedbacks')
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
        Schema::table('feedbacks_rating', function(Blueprint $table) {
            $table->dropForeign('feedbacks_rating_user_id_foreign');
			$table->dropForeign('feedbacks_rating_institution_id_foreign');            
        });

        Schema::dropIfExists('feedbacks_rating');
    }
}
