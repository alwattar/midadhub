<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // name , type -> [], 
        Schema::create('services', function (Blueprint $table) {
            $table->increments('serv_id');
            $table->string('serv_name');
            $table->string('serv_location');
            $table->string('serv_logo')->default('img');
            $table->text('serv_desc');
            $table->integer('serv_points')->default(0);
            $table->float('serv_price')->default(0.0);
            $table->enum('serv_range', ['0','1']);
            $table->enum('serv_type', ['free','percent'])->default('free');

            $table->string('serv_discount_percent')->default('0,1,2,3,4,5');
            $table->string('serv_discount_cash')->default('0,1,2,3,4,5');
            
            $table->date('serv_start_date')->nullable();
            $table->date('serv_end_date')->nullable();
            // forigns
            $table->integer('serv_comp')->unsigned()->index();  // foreign
            $table->foreign('serv_comp')->references('comp_id')->on('companies');
            
            $table->integer('serv_country')->unsigned()->index();  // foreign
            $table->foreign('serv_country')->references('country_id')->on('countries');

            $table->integer('serv_city')->unsigned()->nullable()->index();  // foreign
            $table->foreign('serv_city')->references('city_id')->on('cities');
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
        Schema::dropIfExists('services');
    }
}
