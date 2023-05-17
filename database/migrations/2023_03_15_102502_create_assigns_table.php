<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('vehicle_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('number_plate');
            $table->string('mileage');
            $table->string('report_no');
            $table->string('last_inspection');
            $table->string('next_inspection');
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
        Schema::dropIfExists('assigns');
    }
}
