<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->boolean('closePeriodVote')->default(false);
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create('PurchasedItems', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('userId')->unsigned();
			$table->foreign('userId')
				  ->references('id')->on('Users')
			      ->onUpdate('cascade')
			      ->onDelete('cascade');
			$table->string('description');
			$table->decimal('price', 12, 2);
			$table->softDeletes();
			$table->timestamps();
		});
        
        Schema::create('Participations', function(Blueprint $table) {
			$table->increments('id');
            
			$table->integer('userId')->unsigned();
			$table->foreign('userId')
				  ->references('id')->on('Users')
			      ->onUpdate('cascade')
			      ->onDelete('cascade');
                  
            $table->integer('itemId')->unsigned();
			$table->foreign('itemId')
				  ->references('id')->on('PurchasedItems')
			      ->onUpdate('cascade')
			      ->onDelete('cascade');
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create('Debts', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('payerId')->unsigned();
			$table->foreign('payerId')
				  ->references('id')->on('Users')
			      ->onUpdate('cascade')
			      ->onDelete('cascade');

			$table->integer('payeeId')->unsigned();
			$table->foreign('payeeId')
				  ->references('id')->on('Users')
			      ->onUpdate('cascade')
			      ->onDelete('cascade');

			$table->string('description');
			$table->decimal('amount', 12, 2);
			$table->softDeletes();
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
		Schema::dropIfExists('Debts');
        Schema::dropIfExists('Participations');
		Schema::dropIfExists('PurchasedItems');
		Schema::dropIfExists('Users');
	}

}
