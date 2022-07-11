<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputoInterventionRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computo_intervention_rows', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('practice_id')->nullable()->unsigned();
	        $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
	        $table->bigInteger('condomino_id')->unsigned()->nullable();
	        $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
	        $table->boolean('is_common')->default(false);
	        $table->bigInteger('intervention_folder_id')->unsigned();
	        $table->foreign('intervention_folder_id')->references('id')->on('computo_intervention_folders')->onDelete('cascade');
	        $table->bigInteger('price_row_id')->unsigned();
	        $table->foreign('price_row_id')->references('id')->on('computo_price_list_rows')->onDelete('cascade');
	        $table->text('note')->nullable();
	        $table->float('total')->nullable()->default(0);
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
        Schema::dropIfExists('computo_intervention_rows');
    }
}
