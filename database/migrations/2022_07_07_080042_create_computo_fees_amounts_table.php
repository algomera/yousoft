<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateComputoFeesAmountsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('computo_fees_amounts', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('practice_id')->unsigned();
				$table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
				$table->bigInteger('intervention_folder_id')->unsigned();
				$table->foreign('intervention_folder_id')->references('id')->on('computo_intervention_folders')->onDelete('cascade');
				$table->float('importo_lavori')->nullable();
				$table->float('impon_iva_10')->nullable();
				$table->float('impon_iva_22')->nullable();
				$table->double('spese_prog')->nullable();
				$table->float('importo_spese_prog')->nullable();
				$table->double('supp_prog')->nullable();
				$table->float('importo_supp_prog')->nullable();
				$table->double('prog_reg_forf')->nullable();
				$table->float('importo_prog_reg_forf')->nullable();
				$table->double('ass_tecnica')->nullable();
				$table->float('importo_ass_tecnica')->nullable();
				$table->double('ass_fiscale')->nullable();
				$table->float('importo_ass_fiscale')->nullable();
				$table->float('tot_iva_10')->nullable();
				$table->float('tot_iva_22')->nullable();
				$table->float('tot_spese_e_iva')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('computo_fees_amounts');
		}
	}
