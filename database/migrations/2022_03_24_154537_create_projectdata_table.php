<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectdata', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');

            $table->string('depositated_relation')->nullable();
            $table->string('common')->nullable();
            $table->string('province')->nullable();
            $table->string('data')->nullable();
            $table->string('protocol_number')->nullable();
            $table->string('n_depositated_relation')->nullable();
            $table->string('work_start_date')->nullable();
            $table->string('work_closing_date')->nullable();
            //working on...
            $table->string('condominium')->nullable();
            $table->string('condo_unit')->nullable();
            $table->string('condo_pertinence_numb')->nullable();
            $table->string('centralizated_heating_system')->nullable();
            $table->string('single_family_condo')->nullable();
            $table->string('multi_family_condo')->nullable();
            $table->string('gross_surface')->nullable();

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
        Schema::table('projectdata', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('projectdata');
    }
}
