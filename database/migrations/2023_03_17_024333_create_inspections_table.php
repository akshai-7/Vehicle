<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('assign_id');
            $table->string('inspected_by');
            $table->string('report_no');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('number_plate');
            $table->string('mileage');
            $table->date('date');
            $table->date('next_inspection');
            $table->string('feedback')->default(Null);
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
        Schema::dropIfExists('inspections');
    }
}
