<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            // $table->foreignId("code");
            $table->string("coupon_code");
            $table->double("actual_amount");
            $table->double("commission");
            $table->double("discount");
            $table->double("percent_off");
            $table->double("total");
            $table->double("ba_receivable");
            $table->foreignId("user_id");
            $table->foreignId("restaurant_id");
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
        Schema::dropIfExists('applies');
    }
}
