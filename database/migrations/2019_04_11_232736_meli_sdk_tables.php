<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MeliSdkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meli_sdk_access_tokens', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('external_user_id')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->string('scope')->nullable();
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
        Schema::drop('meli_sdk_access_tokens');
    }
}
