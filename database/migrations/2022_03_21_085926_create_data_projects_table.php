<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateDataProjectsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('data_projects', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('practice_id')->unsigned();
				$table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
				$table->string('technical_report')->nullable();
				$table->string('filed_common')->nullable();
				$table->string('filed_province')->nullable();
				$table->string('filed_date')->nullable();
				$table->string('filed_protocol')->nullable();
				$table->boolean('technical_report_exclusion')->nullable();
				$table->string('work_start')->nullable();
				$table->string('end_of_works')->nullable();
				$table->string('type_building')->nullable();
				$table->integer('building_unit')->nullable();
				$table->integer('relevance')->nullable();
				$table->boolean('centralized_system')->nullable();
				$table->double('gross_surface_area')->nullable();
				$table->integer('np')->nullable();
				$table->integer('np_validated')->nullable();
				$table->integer('np_not_validated')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::table('data_projects', function (Blueprint $table) {
				$table->dropForeign(['practice_id']);
				$table->dropColumn('practice_id');
			});
			Schema::dropIfExists('data_projects');
		}
	}
