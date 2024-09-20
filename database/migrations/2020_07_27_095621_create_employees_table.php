<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lName');
            $table->string('fName');
            $table->string('dob');
            $table->string('province1');
            $table->string('district1');
            $table->string('region1');
            $table->string('province2');
            $table->string('district2');
            $table->string('region2');
            $table->string('position');
            $table->string('tazkira');
            $table->string('start');
            $table->string('end');
            $table->string('TIN');
            $table->string('phone');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('employees');
    }
}
