<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surfaces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->boolean('is_common')->nullable();
            $table->string('intervention')->nullable();
            $table->string('type')->nullable();
            $table->string('description_surface')->nullable();
            $table->double('surface')->nullable();
            $table->double('trasm_ante')->nullable();
            $table->double('trasm_post')->nullable();
            $table->double('trasm_term')->nullable();
            $table->string('confine')->nullable();
            $table->string('insulation')->nullable();
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
        Schema::dropIfExists('surfaces');
    }
}
