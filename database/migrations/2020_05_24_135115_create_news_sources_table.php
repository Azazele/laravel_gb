<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sources', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false)->unique();
            $table->string('link', 255)->nullable(false)->comment('Ссылка на новострой ресурс');
            $table->string('data_link', 255)->nullable(false)->comment('Ссылка на API, XML или другой источник данных');
            $table->text('description')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_sources');
    }
}
