<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->text('photo');
            $table->string('description');
            $table->integer('week');
            $table->string('fee');
            $table->string('discount');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->timestamps();
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')  
                ->onDelete('cascade');
            $table->foreign('lecturer_id')
                ->references('id')
                ->on('lecturers')  
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
