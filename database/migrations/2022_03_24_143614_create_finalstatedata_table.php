<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalstatedataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finalstatedata', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');

            $table->string('plant_type')->nullable();
            $table->string('heat_terminals')->nullable();
            $table->string('distribution_type')->nullable();
            $table->string('adjustment_type')->nullable();
            //generator section before intervent
//            $table->string('generator_type')->nullable();
//            $table->string('generator_number')->nullable();
//            $table->string('performance_percentage')->nullable();
//            $table->string('useful_power')->nullable();
            $table->double('overall_power')->nullable();
            $table->string('energetic_vector')->nullable();
            //summer air conditioning system
            $table->boolean('summer_acs_presence')->nullable();
            $table->longText('summer_acs_renovation')->nullable();
            // APE IE
            $table->string('construction_tipology')->nullable();
            $table->string('heated_volume')->nullable();
            $table->double('dispersing_surface')->nullable();
            $table->double('useful_heated_surface')->nullable();
            $table->double('useful_cooled_surface')->nullable();
            $table->double('SV_report')->nullable();
            $table->integer('generator_inst_date')->nullable();
            $table->longText('extra_maintenance')->nullable();
            // APE IR post intervention
            $table->boolean('winter_acs')->nullable();
            $table->boolean('hot_water_production')->nullable();
            $table->boolean('mechanic_ventilation')->nullable();
            $table->boolean('summer_acs')->nullable();  //air conditioning system
            $table->boolean('lighting')->nullable();
            $table->boolean('transport')->nullable();
            // APE DC
            $table->double('project_temperature')->nullable();
            //APE TR
            $table->double('fotovoltaic_max_power')->nullable();
            $table->double('eolic_nominal_power')->nullable();
            $table->double('collector_surface')->nullable();
            // APE NM
            $table->longText('technical_standard')->nullable();
            $table->longText('energetic_evaluation_method')->nullable();
            //APE DE
            $table->longText('building_description')->nullable();
            //APE I
            $table->double('nr_energy_perf_index')->nullable();  //non-renewable endergy performance index
            $table->double('r_energy_perf_index')->nullable();  //renewable endergy performance index
            //APE Q
            $table->double('EPH')->nullable();
            $table->double('Asup')->nullable();
            $table->double('YIE')->nullable();
            $table->double('EPgl_nren')->nullable();  //energia globale dell'edificio espresso in energia primaria non rinnovabile
            $table->string('invernal_case_quality')->nullable();
            $table->string('summer_case_quality')->nullable();
            $table->string('energetic_class')->nullable();
            $table->boolean('people_transport')->nullable();   // or thing transport
            //APE LC
            $table->longText('possible_improvements')->nullable();

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
        Schema::table('finalstatedata', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('finalstatedata');
    }
}
