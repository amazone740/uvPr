<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMassage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_id')->unsigned();
            $table->integer('to_id')->unsgned();
            $table->foreign('from_id','from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_id','to')->references('id')->on('users')->onDelete('cascade');
            $table->text('content');
            $table->timestamp('create_at')->useCurrent();
            $table->dateTime('read_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       schema::drop('messages');
    }
}
