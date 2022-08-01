<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_rewards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('finder')->nullable();
            $table->double('cost');
            $table->set('status', ['redeemable','redeemed']);
            $table->foreignId("user_id");
            $table->foreignId("reward_item_id");
            $table->foreignId("restaurant_id")->nullable();
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
        Schema::dropIfExists('redeem_rewards');
    }
}
