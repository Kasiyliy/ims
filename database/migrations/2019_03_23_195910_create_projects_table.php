<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title", 255);
            $table->text("description");
            $table->text("short_description");
            $table->text("current_description");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("country", 255);
            $table->string("city", 255);
            $table->double("overall_price");
            $table->integer("investment_time");
            $table->double("year_profit");
            $table->boolean("business_plan");
            $table->boolean("document");
            $table->boolean("asses_provided");

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->bigInteger('sphere_id')->unsigned();
            $table->foreign('sphere_id')
                ->references('id')
                ->on('spheres')
                ->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
