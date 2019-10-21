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
            $table->engine = "InnoDB";
            $table->bigIncrements('pid');
            $table->bigInteger('cid')->unsigned();
            $table->string('title');
            $table->string('field');
            $table->mediumText('description');
            $table->string('status');
            $table->date('datestarted');
            $table->string('duration');
            $table->string('type');
            $table->string('priority');
            $table->timestamps();
            $table->foreign('cid')->references('cid')->on('customers');
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
