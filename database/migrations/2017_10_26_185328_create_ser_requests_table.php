<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ser_requests', function (Blueprint $table) {
            $table->increments('ser_req_id');
            $table->timestamp('ser_req_time');
            $table->string('ser_req_token');
            $table->enum('ser_req_status', ['accepted', 'pending', 'rejected'])->default('pending');

            $table->integer('ser_ser_id')->unsigned()->index()->nullable();  // foreign
            $table->foreign('ser_ser_id')->references('ser_id')->on('services');
            
            $table->integer('ser_req_user')->unsigned()->index()->nullable();  // foreign
            $table->foreign('ser_req_user')->references('u_id')->on('users');


            $table->integer('ser_req_comp')->unsigned()->index()->nullable();  // foreign
            $table->foreign('ser_req_comp')->references('comp_id')->on('companies');
            
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
        Schema::dropIfExists('ser_requests');
    }
}
