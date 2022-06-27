<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('p_iva', 11)->nullable();
            $table->string('c_f')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('mobile_phone', 15)->nullable();
            $table->string('referent')->nullable();
            $table->string('referent_phone', 15)->nullable();
            $table->string('legal_form')->nullable();
            $table->string('rea')->nullable();
            $table->string('c_ateco')->nullable();
            $table->string('reg_date')->nullable();
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
        Schema::dropIfExists('user_data');
    }
}
