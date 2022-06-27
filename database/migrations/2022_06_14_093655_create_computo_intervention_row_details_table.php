<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateComputoInterventionRowDetailsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('computo_intervention_row_details', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('parent_id')->unsigned();
				$table->foreign('parent_id')->references('id')->on('computo_intervention_rows')->onDelete('cascade');
				$table->text('note')->nullable();
				$table->text('expression')->nullable();
				$table->text('nps')->nullable();
				$table->text('length')->nullable();
				$table->text('width')->nullable();
				$table->text('hps')->nullable();
				$table->float('total')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('computo_intervention_row_details');
		}
	}
