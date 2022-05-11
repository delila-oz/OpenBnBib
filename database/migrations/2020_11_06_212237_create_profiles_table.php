<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            //Referenz zum User -> Fremdschlüssel
            $table->unsignedBigInteger('user_id');
            $table->string('profile_title')->nullable();
            $table->string('plz', 5)->nullable();
            $table->string('location')->nullable();
            $table->text('profile_description')->nullable();
            $table->decimal('latitude', 10,7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('is_host')->default('j');
            $table->string('gender')->default('x');
            $table->integer('length_of_stay')->nullable();
            $table->json('offer_as_host')->nullable();
            $table->text('accommodation_description')->nullable();
            $table->string('image')->nullable();
            $table->string('accommodation_type')->nullable();
            $table->text('own_room')->nullable();
            $table->string('pets')->nullable();
            $table->string('accessibility')->nullable();
            $table->integer('number_of_persons')->nullable();
            $table->string('professional_offer')->nullable();
            $table->text('accepts_smoker')->default('n');
            $table->text('professional_description')->nullable();
            $table->timestamps();
            $table->index('user_id');
            //onDelete: wenn User gelöscht wird, wird auch Profile gelöscht
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
        Schema::dropIfExists('profiles');
    }
}
