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
             $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dateOfBirth')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('photo')->nullable();
            $table->string('type')->default('admin');
            $table->text('roles_name')->nullable();
            $table->string('Status', 10)->nullable();
            $table->text('token')->nullable();
            $table->text('device_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
