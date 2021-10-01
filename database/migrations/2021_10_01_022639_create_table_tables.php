<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTables extends Migration
{

    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('number');
            $table->string('state');
            $table->string('QR');

            $table->primary('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
