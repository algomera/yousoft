<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');

            $table->string('sai2_variant_request')->nullable();
            $table->string('technical_relation')->nullable();
            $table->string('sai2_common')->nullable();
            $table->string('sai2_province')->nullable();
            $table->string('sai2_date')->nullable();
            $table->string('protocol_number')->nullable();
            $table->string('post_conventionale_APE')->nullable();
            $table->string('superbonus_variations')->nullable();
            $table->longText('driving_interventions')->nullable();   //trainanti
            $table->longText('towed_interventions')->nullable();    //trainati
            $table->longText('metric_calc')->nullable();  
            $table->string('approved_variants')->nullable();   
            // final SAI
            $table->string('finalSAI_variant_request')->nullable();
            $table->string('final_technical_relation')->nullable();
            $table->string('finalSai_common')->nullable();
            $table->string('finalSai2_province')->nullable();
            $table->string('finalSai2_date')->nullable();
            $table->string('final_protocol_number')->nullable();
            $table->string('final_post_conventionale_APE')->nullable();
            $table->string('final_superbonus_variations')->nullable();
            $table->longText('final_driving_interventions')->nullable();   //trainanti
            $table->longText('final_towed_interventions')->nullable();    //trainati
            $table->longText('final_metric_calc')->nullable();   
            $table->string('final_approved_variants')->nullable();    

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
        Schema::table('variants', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('variants');
    }
}
