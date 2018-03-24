<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstitutionsRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();            
            $table->enum('rating', [
                1, 2, 3, 4, 5
            ]);
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('institution_id')->unsigned();
        });

        Schema::table('institutions_rating', function (Blueprint $table) {
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
        Schema::table('institutions_rating', function(Blueprint $table) {
            $table->dropForeign('institutions_rating_user_id_foreign');
			$table->dropForeign('institutions_rating_institution_id_foreign');            
        });
        
        Schema::drop('institutions_rating');
    }
}
