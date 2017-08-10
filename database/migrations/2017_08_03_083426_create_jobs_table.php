<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('desc');
            $table->integer('cat_id');
            $table->integer('client_id')->unsigned()->index();
            $table->string('phone');
            $table->string('date');
            $table->integer('provider_rate');
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('status');
            $table->string('end_date');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
