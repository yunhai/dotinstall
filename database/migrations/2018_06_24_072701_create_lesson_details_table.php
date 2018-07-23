<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_details', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->string('name', 256);
            $table->text('caption');
            $table->unsignedInteger('video');
            $table->unsignedInteger('duration')->default(0);
            $table->unsignedInteger('poster')->default(0);
            $table->unsignedTinyInteger('mode')->default(0);
            $table->unsignedTinyInteger('free_mode')->default(1);
            $table->unsignedInteger('sort')->default(1);
            $table->unsignedInteger('lesson_id');
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
        Schema::dropIfExists('lesson_media');
    }
}
