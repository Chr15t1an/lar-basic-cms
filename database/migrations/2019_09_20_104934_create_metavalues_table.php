<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetavaluesTable extends Migration
{
    /**
     * Create metavalues table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metavalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meta_key')->unique();
            $table->longText('meta_value');
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
        Schema::dropIfExists('metavalues');
    }
}
