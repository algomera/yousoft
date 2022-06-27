<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateSunscreensTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('sunscreens', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('practice_id')->unsigned();
				$table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
				$table->bigInteger('condomino_id')->unsigned()->nullable();
				$table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
				$table->boolean('is_common')->default(false);
				$table->string('tipo_schermatura')->nullable();
				$table->string('installazione')->nullable();
				$table->double('sup_schermatura')->nullable();
				$table->double('sup_finestra_protetta')->nullable();
				$table->double('resist_termica_suppl')->nullable();
				$table->string('orientamento')->nullable();
				$table->string('tipo_di_calcolo')->nullable();
				$table->double('gtot')->nullable();
				$table->string('classe_scherm')->nullable();
				$table->string('materiale_scherm')->nullable();
				$table->string('meccanismo_reg')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('sunscreens');
		}
	}
