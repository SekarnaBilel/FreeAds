<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('seller_id')->unsigned;
            $table->foreign('seller_id')->references('id')->on('users')
            ->onDelete('cacade');
            $table->integer('buyer_id')->unsigned;
            $table->foreign('buyer_id')->references('id')->on('users')
            ->onDelete('cacade');
            $table->integer('ad_id')->unsigned;
            $table->foreign('ad_id')->references('id')->on('ads')
            ->onDelete('cacade');
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
        Schema::dropIfExists('messages');
    }
};
