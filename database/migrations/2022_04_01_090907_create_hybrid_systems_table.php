<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHybridSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hybrid_systems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->boolean('is_common')->default(false);
            $table->string('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->double('condensing_potenza_nominale')->nullable();
            $table->double('condensing_rend_utile_nom')->nullable();
            $table->double('condensing_efficienza_ns')->nullable();
            $table->string('tipo_di_alimentazione')->nullable();
            $table->string('heat_tipo_di_pdc')->nullable();
            $table->boolean('heat_tipo_roof_top')->default(false)->nullable();
            $table->double('heat_potenza_nominale')->nullable();
            $table->double('heat_p_elettrica_assorbita')->nullable();
            $table->boolean('heat_inverter')->default(false)->nullable();
            $table->double('heat_cop')->nullable();
            $table->boolean('heat_sonde_geotermiche')->default(false)->nullable();
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
        Schema::dropIfExists('hybrid_systems');
    }
}
