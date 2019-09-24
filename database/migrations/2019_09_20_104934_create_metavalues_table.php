<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetavaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metavalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->longText('first_name');
            //Wordpress Adds a meta key, Laravel should already add
            //https://laravel.com/docs/5.8/migrations Adds meta_key_id
            //Also I dont have a complex use case at the moment.
            //https://codex.wordpress.org/Metadata_API
            // $table->morphs('meta_key');
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
