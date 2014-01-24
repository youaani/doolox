<?php

use Illuminate\Database\Migrations\Migration;

class Install extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('domains', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('url');
            $table->boolean('activated');
            $table->dateTime('activated_at');
            $table->timestamps();
            $table->boolean('system_domain');
            $table->boolean('auto_billing');

            $table->foreign('user_id')->references('id')->on('users');
            $table->engine = 'InnoDB';
            $table->unique('url');
        });

        Schema::create('sites', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('url');
            $table->string('admin_url')->nullable();
            $table->boolean('local');
            $table->string('subdomain')->nullable();
            $table->integer('domain_id')->unsigned()->nullable();
            $table->boolean('connected');
            $table->binary('private_key')->nullable();
            $table->binary('public_key')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('domain_id')->references('id')->on('domains');
            $table->engine = 'InnoDB';
        });

        Schema::create('site_user', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('site_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('site_user');
        Schema::drop('sites');
        Schema::drop('domains');
	}

}