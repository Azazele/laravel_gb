<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_auth', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->nullable();
            $table->bigInteger('id_in_social')->nullable();
            $table->timestamps();
            $table->string('email', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('social_slug', 191);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_auth');
    }
}
