<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->foreignId('general_contractor')->nullable()->constrained('anagrafiche');
            $table->foreignId('construction_company')->nullable()->constrained('anagrafiche');
            $table->foreignId('hydrothermal_sanitary_company')->nullable()->constrained('anagrafiche');
            $table->foreignId('photovoltaic_company')->nullable()->constrained('anagrafiche');
            $table->foreignId('technician_APE_Ante')->nullable()->constrained('anagrafiche');
            $table->foreignId('technician_APE_Post')->nullable()->constrained('anagrafiche');
            $table->foreignId('technician_energy_efficient')->nullable()->constrained('anagrafiche');
            $table->foreignId('structural_engineer')->nullable()->constrained('anagrafiche');
            $table->foreignId('metric_calc_technician')->nullable()->constrained('anagrafiche');
            $table->foreignId('work_director')->nullable()->constrained('anagrafiche');
            $table->foreignId('technical_assev')->nullable()->constrained('anagrafiche');
            $table->foreignId('fiscal_assev')->nullable()->constrained('anagrafiche');
            $table->foreignId('phiscal_transferee')->nullable()->constrained('anagrafiche');
            $table->foreignId('lending_bank')->nullable()->constrained('anagrafiche');
            $table->foreignId('insurer')->nullable()->constrained('anagrafiche');
            $table->foreignId('consultant')->nullable()->constrained('anagrafiche');
            $table->foreignId('area_manager')->nullable()->constrained('anagrafiche');
            $table->string('project_manager')->nullable();
            $table->string('responsible_technician')->nullable();
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
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropForeign(['general_contractor']);
            $table->dropForeign(['construction_company']);
            $table->dropForeign(['hydrothermal_sanitary_company']);
            $table->dropForeign(['photovoltaic_company']);
            $table->dropForeign(['technician_APE_Ante']);
            $table->dropForeign(['technician_APE_Post']);
            $table->dropForeign(['technician_energy_efficient']);
            $table->dropForeign(['structural_engineer']);
            $table->dropForeign(['metric_calc_technician']);
            $table->dropForeign(['work_director']);
            $table->dropForeign(['technical_assev']);
            $table->dropForeign(['fiscal_assev']);
            $table->dropForeign(['phiscal_transferee']);
            $table->dropForeign(['lending_bank']);
            $table->dropForeign(['insurer']);
            $table->dropForeign(['consultant']);
            $table->dropForeign(['area_manager']);

            $table->dropColumn('practice_id');
            $table->dropColumn('general_contractor');
            $table->dropColumn('construction_company');
            $table->dropColumn('hydrothermal_sanitary_company');
            $table->dropColumn('photovoltaic_company');
            $table->dropColumn('technician_APE_Ante');
            $table->dropColumn('technician_APE_Post');
            $table->dropColumn('technician_energy_efficient');
            $table->dropColumn('structural_engineer');
            $table->dropColumn('metric_calc_technician');
            $table->dropColumn('work_director');
            $table->dropColumn('technical_assev');
            $table->dropColumn('fiscal_assev');
            $table->dropColumn('phiscal_transferee');
            $table->dropColumn('lending_bank');
            $table->dropColumn('insurer');
            $table->dropColumn('consultant');
            $table->dropColumn('area_manager');
        });

        Schema::dropIfExists('subjects');
    }
}
