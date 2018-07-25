<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_utms', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('utm_source');
            $table->string('utm_code', 1024);
            $table->dateTime('utm_date');
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
        Schema::dropIfExists('user_utms');
    }
}
