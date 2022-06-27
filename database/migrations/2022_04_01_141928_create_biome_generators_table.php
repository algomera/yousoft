<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiomeGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biome_generators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->boolean('is_common')->default(false);
            $table->string('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->string('classe_generatore')->nullable();
            $table->string('tipo_generatore')->nullable();
            $table->string('use_destination')->nullable();
            $table->string('tipo_di_alimentazione')->nullable();
            $table->double('p_utile_nom')->nullable();
            $table->double('p_al_focolare')->nullable();
            $table->double('rend_utile_alla_pot_nom')->nullable();
            $table->double('sup_riscaldata')->nullable();
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
        Schema::dropIfExists('biome_generators');
    }
}
