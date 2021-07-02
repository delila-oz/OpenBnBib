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
            //onDelete: wenn Nutzer gelöscht wird, wird auch commentar gelöscht
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
