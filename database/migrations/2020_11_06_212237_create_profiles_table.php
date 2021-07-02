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
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->boolean('is_host')->default(0);
            $table->integer('length_of_stay')->nullable();
            $table->json('offer_as_host')->nullable();
            $table->text('accommodation_description')->nullable();
            $table->string('image')->nullable();
            $table->string('accommodation_type')->nullable();
            $table->boolean('own_room')->nullable();
            $table->string('pets')->nullable();
            $table->string('accessibility')->nullable();
            $table->integer('number_of_persons')->nullable();
            $table->string('professional_offer')->nullable();
            $table->string('accepts_smoker')->nullable();
            $table->text('professional_description')->nullable();
            $table->timestamps();
            $table->index('user_id');
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
