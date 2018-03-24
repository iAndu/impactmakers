<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstitutionsTable extends Migration {

	public function up()
	{
		Schema::create('institutions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('added_by')->unsigned()->nullable();
			$table->string('address');
			$table->string('email')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('owner_name')->nullable();
			$table->string('fb_page')->nullable();
			$table->string('twitter_page')->nullable();
			$table->string('ig_page')->nullable();
			$table->text('description')->nullable();
			$table->decimal('ratio')->nullable();
			$table->string('website')->nullable();
			$table->decimal('lat', 15,10);
			$table->decimal('lng', 15,10);
			$table->boolean('status')->default(0);
			$table->integer('type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('institutions');
	}
}