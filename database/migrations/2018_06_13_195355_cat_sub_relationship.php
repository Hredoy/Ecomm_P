<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatSubRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subs_id')->unsigned();
            $table->foreign('subs_id')->references('id')->on('subs');
            $table->integer('categorys_id')->unsigned();
            $table->foreign('categorys_id')->references('id')->on('categorys');
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
        Schema::dropIfExists('categorys_subs');
    }
}
