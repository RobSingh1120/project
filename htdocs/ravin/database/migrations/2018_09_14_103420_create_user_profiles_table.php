<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
             $table->string('email')->nullable();
             $table->string('contactno')->nullable();
             $table->string('dob')->nullable();
             $table->string('licence')->nullable();
             $table->string('certificate')->nullable();
             $table->string('others')->nullable();
             $table->string('address')->nullable();
             $table->string('education')->nullable();
             $table->string('hospital_name')->nullable();
             $table->string('payment_preference')->nullable();
             $table->boolean('status')->default('0');
             $table->boolean('approved')->default('0');
             $table->boolean('discount')->default('0');
             $table->integer('role')->default('1');        
             $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users');
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
        Schema::dropIfExists('user_profiles');
    }
}
