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
        Schema::create('course_detail_logs', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('course_id');
    $table->unsignedBigInteger('course_detail_id');
    $table->string('action'); // created | updated | deleted
    $table->longText('old_data')->nullable();
    $table->longText('new_data')->nullable();
    $table->unsignedBigInteger('user_id')->nullable();
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
        //
    }
};
