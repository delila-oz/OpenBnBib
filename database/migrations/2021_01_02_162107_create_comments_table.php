<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            //Sendender User
            $table->unsignedBigInteger('user_id');
            //Empfangendes Profil
            $table->unsignedBigInteger('profile_id');
            $table->text('message');
            $table->timestamps();
            $table->index('user_id');
            //onDelete: wenn Nutzer gelöscht wird, wird auch Kommentar für ihn gelöscht
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
