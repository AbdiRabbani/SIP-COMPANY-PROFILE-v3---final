<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTagConnectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_tag_connector', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_tag')->unsigned();
            $table->foreign('id_tag')->references('id')->on('news_tag')->onDelete('cascade');
            $table->integer('id_insights')->unsigned();
            $table->foreign('id_insights')->references('id')->on('insights')->onDelete('cascade');
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
        Schema::dropIfExists('news_tag_connector');
    }
}
