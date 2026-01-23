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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->decimal('rating', 2, 1)->default(0); // 1.0 – 5.0
            $table->string('duration')->nullable(); // e.g. "6 Weeks"
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('has_video_lectures')->default(0);
            $table->boolean('has_online_session')->default(0);
            $table->string('language')->nullable(); // English, Urdu, etc
                $table->softDeletes(); // IMPORTANT

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
