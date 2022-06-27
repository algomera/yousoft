<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->string('intervention_name')->nullable();
            $table->string('company_role')->nullable();
            $table->string('intervention_tipology')->nullable();
            $table->string('build_address')->nullable();
            $table->string('build_civic_number')->nullable();
            $table->string('common')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('cap')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('condominio')->nullable();
//            $table->string('iban')->nullable();
            $table->string('build_type')->nullable();
            $table->string('zone')->nullable();
            $table->string('section')->nullable();
            $table->string('foil')->nullable();
            $table->string('particle')->nullable();
            $table->string('subaltern')->nullable();
            $table->string('unit_building_number')->nullable();
            $table->string('pertinence_number')->nullable();
            $table->string('resolution_stairs')->nullable();
            $table->string('note')->nullable();
            $table->string('imported_excel_file')->nullable();
            //check section
            $table->string('cultural_constraints')->nullable();
            $table->string('denied_intervents')->nullable();
            $table->string('mountain_common')->nullable();
            $table->string('infringment_common')->nullable();
            $table->string('sismic_events_zone')->nullable();
            $table->string('isUnderRenovation')->nullable();
            $table->string('nonMetan_area')->nullable();
            $table->string('building_authorization')->nullable();
            //license
            $table->string('license_number')->nullable();
            $table->string('license_date')->nullable();
            $table->string('construction_date')->nullable();
            // administration data
            $table->string('administrator_fullname')->nullable();
            $table->string('administrator_surname')->nullable();
            $table->string('administrator_name')->nullable();
            $table->string('administrator_fiscalcode')->nullable();
            $table->string('administrator_address')->nullable();
            $table->string('administrator_city')->nullable();
            $table->string('administrator_province')->nullable();
            $table->string('administrator_cap')->nullable();
            $table->string('administrator_telephone')->nullable();
            $table->string('administrator_cellphone')->nullable();
            $table->string('administrator_email')->nullable();
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
        Schema::table('buildings', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('buildings');
    }
}
