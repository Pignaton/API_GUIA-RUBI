<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('username', 20)->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->bigInteger('last_imei');
            $table->string('remember_token', 100);
            $table->string('token', 100);
            $table->softDeletesTz('deleted_at', 0);
        });

        Schema::create('access_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestampsTz();
        });

        Schema::create('gcm', function (Blueprint $table) {
            $table->id();
            $table->string('device', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('version', 100);
            $table->text('regid');
            $table->bigInteger('date_create');
        });

        Schema::create('news_info', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('brief_content', 100);
            $table->text('full_content');
            $table->string('image', 100);
            $table->bigInteger('last_update');
        });

        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
        });

        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name', 100)->default('default.jpg');
            $table->string('image', 100);
            $table->string('address', 100);
            $table->string('phone', 25)->nullable();
            $table->string('website', 100)->nullable();
            $table->text('description');
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('last_update')->nullable();
        });

        Schema::create('place_category', function (Blueprint $table) {
 
            $table->id();
            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('access_levels');
        Schema::dropIfExists('gcm');
        Schema::dropIfExists('news_info');
        Schema::dropIfExists('places');
        Schema::dropIfExists('place_category');
        Schema::dropIfExists('category');
    }
}
