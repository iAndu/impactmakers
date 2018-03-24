<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('institutions', function(Blueprint $table) {
			$table->foreign('added_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('institutions', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('institution_types')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('institutions', function(Blueprint $table) {
			$table->dropForeign('institutions_added_by_foreign');
		});
		Schema::table('institutions', function(Blueprint $table) {
			$table->dropForeign('institutions_type_id_foreign');
		});
	}
}