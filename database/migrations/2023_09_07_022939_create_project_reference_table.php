<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_reference', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('image');
            $table->text('desc');
            $table->enum('type', [1, 2, 3, 4, 5, 6]);
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('partner_section')->onDelete('cascade');
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
        Schema::dropIfExists('project_reference');
    }
}
