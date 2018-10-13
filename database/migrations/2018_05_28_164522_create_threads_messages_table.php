<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_threads_messages', function (Blueprint $table) {
            $table->increments('id');
          
            $table->integer('thread_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('body');
            $table->timestamps();
            $table->string('type');
            $table->string('file_type')->nullable();
            $table->string('file_path')->nullable();
            $table->foreign('thread_id')->references('id')->on('chat_threads')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->integer("read_mess")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_threads_messages');
    }
}
