<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatorInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliator_invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('affiliator_id');
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('free')->default(0);
            $table->dateTime('join_date')->nullable();
            $table->unsignedInteger('affiliator_commission_base')->default(0);
            $table->decimal('affiliator_commission_rate', 5, 2)->default(0);
            $table->unsignedInteger('affiliator_commission')->default(0);
            $table->string('affiliator_token', 256);
            $table->unsignedTinyInteger('mode')->default(1);
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
        Schema::dropIfExists('affiliator_invitations');
    }
}
