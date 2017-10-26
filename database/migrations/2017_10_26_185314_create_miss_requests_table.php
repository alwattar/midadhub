<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miss_requests', function (Blueprint $table) {
            $table->increments('miss_req_id');
            $table->timestamp('miss_req_time');
            $table->enum('miss_req_status', ['accepted', 'pending', 'rejected'])->default('pending');

            $table->integer('miss_miss_id')->unsigned()->index()->nullable();  // foreign
            $table->foreign('miss_miss_id')->references('miss_id')->on('missions');

            
            $table->integer('miss_req_user')->unsigned()->index()->nullable();  // foreign
            $table->foreign('miss_req_user')->references('u_id')->on('users');


            $table->integer('miss_req_comp')->unsigned()->index()->nullable();  // foreign
            $table->foreign('miss_req_comp')->references('comp_id')->on('companies');
            
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
        Schema::dropIfExists('miss_requests');
    }
}
