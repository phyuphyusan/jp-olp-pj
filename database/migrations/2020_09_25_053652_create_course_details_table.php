<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->integer('week');
            $table->string('chapter_title');
            $table->text('video');
            $table->text('document');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')  
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
        Schema::dropIfExists('course_details');
    }
}
