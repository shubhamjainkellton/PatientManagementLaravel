<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address');
            $table->bigInteger('phone_no');
            $table->string('department')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->integer('consultancy_fee')->nullable();
            $table->string('consultancy_days')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('role_id')->default(3);

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict');

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
    }
}
