<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_declarations', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('practice_id')->unsigned();
	        $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');

			// Ecobonus trainanti
			$table->float('ecobonus_driving_cost')->nullable();
	        $table->float('ecobonus_driving_cost_sal_1')->nullable();
	        $table->float('ecobonus_driving_cost_sal_2')->nullable();
	        $table->float('ecobonus_driving_cost_sal_f')->nullable();
	        $table->float('ecobonus_driving_cost_sal_1_2')->nullable();
	        $table->float('ecobonus_driving_cost_sal_1_2_f')->nullable();
			// Ecobonus trainati
	        $table->float('ecobonus_towed_cost')->nullable();
	        $table->float('ecobonus_towed_cost_sal_1')->nullable();
	        $table->float('ecobonus_towed_cost_sal_2')->nullable();
	        $table->float('ecobonus_towed_cost_sal_f')->nullable();
	        $table->float('ecobonus_towed_cost_sal_1_2')->nullable();
	        $table->float('ecobonus_towed_cost_sal_1_2_f')->nullable();
			// Ecobonus totali
	        $table->float('ecobonus_project_cost')->nullable();
	        $table->float('ecobonus_realized_sal_1')->nullable();
	        $table->float('ecobonus_realized_sal_2')->nullable();
	        $table->float('ecobonus_realized_sal_f')->nullable();
	        $table->float('ecobonus_realized_sal_1_2')->nullable();
	        $table->float('ecobonus_realized_sal_1_2_f')->nullable();
	        // Sismabonus totali
	        $table->float('sismabonus_project_cost')->nullable();
	        $table->float('sismabonus_realized_sal_1')->nullable();
	        $table->float('sismabonus_realized_sal_2')->nullable();
	        $table->float('sismabonus_realized_sal_f')->nullable();
	        $table->float('sismabonus_realized_sal_1_2')->nullable();
	        $table->float('sismabonus_realized_sal_1_2_f')->nullable();
			// Contratto nazionale
	        $table->string('national_contract')->nullable();

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
        Schema::dropIfExists('fees_declarations');
    }
}
