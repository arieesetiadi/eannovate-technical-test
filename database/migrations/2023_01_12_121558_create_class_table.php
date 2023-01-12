<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->string('id', 64)->nullable(false);
            $table->string('name', 64)->nullable(false);
            $table->string('major', 64)->nullable(false);
            $table->string('created_by', 64)->nullable(false);
            $table->timestamp('created_date')->nullable(false)->default(now());
            $table->string('modified_by', 64)->nullable(false);
            $table->timestamp('modified_date')->nullable(false)->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
