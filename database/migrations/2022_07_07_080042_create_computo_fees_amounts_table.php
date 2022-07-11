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
				$table->float('importo_lavori')->nullable()->default(0);
				$table->float('impon_iva_10')->nullable()->default(0);
				$table->float('impon_iva_22')->nullable()->default(0);
				$table->double('spese_prog')->nullable()->default(0);
				$table->float('importo_spese_prog')->nullable()->default(0);
				$table->double('supp_prog')->nullable()->default(0);
				$table->float('importo_supp_prog')->nullable()->default(0);
				$table->double('prog_reg_forf')->nullable()->default(0);
				$table->float('importo_prog_reg_forf')->nullable()->default(0);
				$table->double('ass_tecnica')->nullable()->default(0);
				$table->float('importo_ass_tecnica')->nullable()->default(0);
				$table->double('ass_fiscale')->nullable()->default(0);
				$table->float('importo_ass_fiscale')->nullable()->default(0);
				$table->float('tot_iva_10')->nullable()->default(0);
				$table->float('tot_iva_22')->nullable()->default(0);
				$table->float('tot_spese_e_iva')->nullable()->default(0);
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
