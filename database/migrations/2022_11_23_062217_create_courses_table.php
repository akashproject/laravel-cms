<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->char('type_id', 100)->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('description')->nullable();           
            $table->text ('excerpt')->nullable();           
            $table->char('duration', 50)->nullable();
            $table->char('no_of_module', 50)->nullable();
            $table->boolean('status',100)->default('1');
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
        Schema::dropIfExists('courses');
    }
};
