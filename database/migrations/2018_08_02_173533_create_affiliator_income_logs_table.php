<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatorIncomeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliator_income_logs', function (Blueprint $table) {
            $table->engine = 'InnoDB ROW_FORMAT=DYNAMIC';
            $table->increments('id');
            $table->date('target_date');
            $table->unsignedInteger('affiliator_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('affiliator_commission_base')->default(0);
            $table->decimal('affiliator_commission_rate', 5, 2)->default(0);
            $table->unsignedInteger('affiliator_commission')->default(0);
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
        Schema::dropIfExists('affiliator_income_logs');
    }
}
