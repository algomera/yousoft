<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreatePracticesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('practices', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('applicant_id')->unsigned();
				$table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
				$table->bigInteger('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
				$table->float('import')->nullable();
				$table->string('practical_phase')->nullable();
				$table->string('real_estate_type')->nullable();
				$table->string('policy_name')->nullable();
				$table->string('address')->nullable();
				$table->string('civic')->nullable();
				$table->string('common')->nullable();
				$table->string('province')->nullable();
				$table->string('region')->nullable();
				$table->string('cap')->nullable();
				$table->string('work_start')->nullable();
				$table->float('c_m')->nullable();
				$table->float('assev_tecnica')->nullable();
				$table->text('description')->nullable();
				$table->string('referent_email')->nullable();
				$table->string('referent_mobile')->nullable();
				$table->boolean('policy')->default(false);
				$table->string('request_policy')->nullable();
				$table->boolean('superbonus')->default(false);
				$table->string('sal_1_work_start')->nullable();
				$table->float('sal_1_import')->nullable();
				$table->string('sal_2_work_start')->nullable();
				$table->float('sal_2_import')->nullable();
				$table->string('sal_f_work_start')->nullable();
				$table->float('sal_f_import')->nullable();
				$table->text('note')->nullable();
				$table->boolean('practice_ok')->default(false);
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::disableForeignKeyConstraints();
			Schema::table('practices', function (Blueprint $table) {
				$table->dropForeign(['applicant_id']);
				$table->dropColumn('applicant_id');
			});
			Schema::dropIfExists('practices');
		}
	}
