<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stats', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('closed_lesson_detail_count')->default(0);
            $table->unsignedInteger('learning_date_count')->default(0);
            $table->unsignedInteger('learning_duration')->default(0);
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
        Schema::dropIfExists('user_stats');
    }
}
