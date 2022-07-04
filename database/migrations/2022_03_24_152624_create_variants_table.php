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
		public function up() {
			Schema::create('variants', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('practice_id')->unsigned();
				$table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
				// SAL 2
				$table->boolean('sal_2_request_variant')->nullable();
				$table->boolean('sal_2_technical_relation')->nullable();
				$table->string('sal_2_common')->nullable();
				$table->string('sal_2_province')->nullable();
				$table->string('sal_2_date')->nullable();
				$table->string('sal_2_protocol_number')->nullable();
				$table->boolean('sal_2_APE_post_conventional')->nullable();
				$table->boolean('sal_2_superbonus_variations')->nullable();
				$table->longText('sal_2_driving_interventions')->nullable();   //trainanti
				$table->longText('sal_2_towed_interventions')->nullable();    //trainati
				$table->longText('sal_2_computo_metrico')->nullable();
				$table->boolean('sal_2_approved_variant')->nullable();
				// SAL Finale
				$table->boolean('sal_f_request_variant')->nullable();
				$table->boolean('sal_f_technical_relation')->nullable();
				$table->string('sal_f_common')->nullable();
				$table->string('sal_f_province')->nullable();
				$table->string('sal_f_date')->nullable();
				$table->string('sal_f_protocol_number')->nullable();
				$table->boolean('sal_f_APE_post_conventional')->nullable();
				$table->boolean('sal_f_superbonus_variations')->nullable();
				$table->longText('sal_f_driving_interventions')->nullable();   //trainanti
				$table->longText('sal_f_towed_interventions')->nullable();    //trainati
				$table->longText('sal_f_computo_metrico')->nullable();
				$table->boolean('sal_f_approved_variant')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::table('variants', function (Blueprint $table) {
				$table->dropForeign(['practice_id']);
				$table->dropColumn('practice_id');
			});
			Schema::dropIfExists('variants');
		}
	}
