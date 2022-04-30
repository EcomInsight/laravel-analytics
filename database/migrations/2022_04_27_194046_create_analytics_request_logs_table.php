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
        Schema::create('analytics_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->string('url');

            $table->string('method');
            $table->integer('response_time');
            $table->string('locale')->nullable();
            $table->json('payload')->nullable();

            $table->string('ip');
            $table->string('session_id');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analytics_request_logs');
    }
};
