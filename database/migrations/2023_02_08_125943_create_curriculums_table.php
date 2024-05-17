<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('name')->nullable();
            $table->string('duration',50)->nullable();
            $table->string('type',10)->nullable();
            $table->text('benefits')->nullable();
            $table->integer('no_of_lecture')->nullable();
            $table->integer('lecture')->nullable();
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
        Schema::dropIfExists('curriculums');
    }
};
