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
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->string('company');
            $table->string('license');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('User');
            $table->string('vehicle_id')->nullable();
            $table->string('vehicle_no')->nullable();
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
