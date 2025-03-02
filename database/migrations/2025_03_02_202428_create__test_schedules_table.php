<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testSchedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidateInfo_id');
            $table->foreign('candidateInfo_id')->references('id')->on('candidateInfo')->onDelete('cascade');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('test_date');
            $table->string('test_type');
            $table->text('location');
            $table->boolean('email_sent')->default(false);
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
        Schema::dropIfExists('testSchedules');
    }
}
