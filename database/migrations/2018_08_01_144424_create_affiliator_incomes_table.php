<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatorIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliator_incomes', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->unsignedInteger('affiliator_id');
            $table->date('target_date');
            $table->unsignedInteger('invitation')->default(0);
            $table->unsignedInteger('commission')->default(0);
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
        Schema::dropIfExists('affiliator_incomes');
    }
}
