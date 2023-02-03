<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advised_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advised_id')->onDelete('cascade')->nullable();
            $table->foreignId('course_id')->onDelete('cascade')->nullable();
            $table->string('credit');
            $table->string('semister');
            $table->integer('fee');
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
        Schema::dropIfExists('advised_courses');
    }
}
