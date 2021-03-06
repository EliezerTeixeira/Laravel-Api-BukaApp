<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('short_description');
            $table->text('description')->nullable();
            $table->float('price');
            $table->string('course_time');
            $table->date('start_at');
            $table->date('end_at');
            $table->unsignedBigInteger('teacher_id');
            $table->string('schedule');
            $table->string('link');
            $table->unsignedBigInteger('level_id');
            $table->timestamps();

            $table  ->foreign('teacher_id')
                    ->references('id')->on('teachers')
                    ->onDelete('cascade');

             $table ->foreign('level_id')
                    ->references('id')->on('levels')
                    ->onDelete('cascade');
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
}
