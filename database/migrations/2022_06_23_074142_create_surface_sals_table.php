<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurfaceSalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surface_sals', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('practice_id')->unsigned();
	        $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
	        $table->bigInteger('condomino_id')->unsigned()->nullable();
	        $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
	        $table->boolean('is_common')->nullable();
	        $table->string('intervention')->nullable();
	        $table->string('type')->nullable();
	        $table->double('sal_1')->nullable();
	        $table->double('sal_2')->nullable();
	        $table->double('sal_f')->nullable();
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
        Schema::dropIfExists('surface_sals');
    }
}
