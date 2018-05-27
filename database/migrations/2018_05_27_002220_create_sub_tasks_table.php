<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('cod');
            $table->string('type');
            $table->text('description');
            $table->boolean('back');
            $table->boolean('front');
            $table->boolean('qa');
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
        Schema::drop('sub_tasks');
    }
}
