<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYoutubeLinkMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube_link_media', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->unsignedInteger('youtube_link_id');
            $table->unsignedInteger('media_id');
            $table->string('url', 256);
            $table->unsignedInteger('sort')->default(1);
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
        Schema::dropIfExists('youtube_link_media');
    }
}
