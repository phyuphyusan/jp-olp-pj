<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('bachelor');
            $table->string('position');
             // $table->mediumText('about_lecturer');
            // $table->string('phone_no');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('university_id');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')  
                ->onDelete('cascade');
            $table->foreign('university_id')
                ->references('id')
                ->on('universities')  
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
        Schema::dropIfExists('lecturers');
    }
}
