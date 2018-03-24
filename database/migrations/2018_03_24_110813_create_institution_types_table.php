<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstitutionTypesTable extends Migration {

	public function up()
	{
		Schema::create('institution_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('badge');
		});
	}

	public function down()
	{
		Schema::drop('institution_types');
	}
}