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
            $table->increments('id');
            $table->string('course_type')->nullable();;         
            $table->string('course_title',60)->nullable();;         
            $table->text('categories_selection')->nullable();    
            $table->text('time_selection')->nullable();                
            $table->text('learnable_skill')->nullable();    
            $table->text('course_requirement')->nullable();    
            $table->text('targeting_student')->nullable();                
            $table->string('c_level')->nullable();    
            $table->text('description',1800)->nullable();    
            $table->string('user_id')->nullable();         
            $table->string('status')->nullable();         
            $table->boolean('isPopular')->nullable();         
            $table->boolean('isFeatured')->nullable();         
            $table->text('slug')->nullable();        
            $table->boolean('has_u_update_url')->nullable();        
            $table->boolean('is_deleted')->nullable();        
            $table->integer('lang_id')->nullable();        
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
}
