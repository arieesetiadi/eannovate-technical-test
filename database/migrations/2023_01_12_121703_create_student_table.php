<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('id', 64)->nullable(false);
            $table->string('username', 64)->nullable(false);
            $table->string('email', 256)->nullable(false);
            $table->integer('age')->nullable(false);
            $table->string('phone_number', 16)->nullable();
            $table->text('picture')->nullable();
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
        Schema::dropIfExists('student');
    }
}
