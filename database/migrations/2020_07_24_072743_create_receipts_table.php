<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('date');
            $table->string('name');
            $table->string('fName');
            $table->integer('doc1');
            $table->integer('doc2');
            $table->integer('doc3');
            $table->integer('doc4');
            $table->string('doc5');
            $table->string('doc6');
            $table->string('doc7');
            $table->string('doc8');
            $table->string('doc9');
            $table->string('doc10');
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
        Schema::dropIfExists('receipts');
    }
}
