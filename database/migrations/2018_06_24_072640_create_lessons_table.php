<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->string('name', 256);
            $table->text('caption')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('difficulty')->default(2);
            $table->unsignedInteger('sort')->default(0);
            $table->unsignedTinyInteger('mode')->default(0);
            $table->unsignedTinyInteger('free_mode')->default(0);
            $table->unsignedInteger('poster')->default(0);
            $table->unsignedInteger('category_id')->default(0);
            $table->unsignedInteger('video_count')->default(0);
            $table->unsignedInteger('created_user_id')->default(0);
            $table->unsignedInteger('updated_user_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
