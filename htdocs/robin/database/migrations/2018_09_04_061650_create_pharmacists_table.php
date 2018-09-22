<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacists', function (Blueprint $table) {
            $table->increments('id');
              $table->string('name');
            $table->string('email');
             $table->string('contactno');
             $table->string('dob');
             $table->string('practice_start_date');
             $table->string('licence');
             $table->string('certificate');
             $table->string('others');
             $table->string('address');
             $table->string('education');
             $table->string('hospital_name');
             $table->string('payment_preference');
             $table->string('fee_bmct');
             $table->string('fee_cash_wallet');
             $table->integer('role')->unsigned();
             $table->foreign('role')->references('id')->on('roles');
             $table->boolean('status');
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
        Schema::dropIfExists('pharmacists');
    }
}
