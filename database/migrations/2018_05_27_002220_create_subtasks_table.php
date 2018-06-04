<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('cod');
            $table->string('type');
            $table->text('description');
            $table->float('subtask_size');
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
        Schema::drop('subtasks');
    }
}
