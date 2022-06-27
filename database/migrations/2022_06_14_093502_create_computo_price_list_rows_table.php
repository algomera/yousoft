<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputoPriceListRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computo_price_list_rows', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger('parent_id')->nullable();
	        $table->bigInteger('folder_id')->nullable()->unsigned();
	        $table->foreign('folder_id')->references('id')->on('computo_price_lists')->onDelete('cascade');
			$table->string('code')->nullable();
	        $table->text('short_description')->nullable();
	        $table->text('description')->nullable();
	        $table->text('long_description')->nullable();
	        $table->string('um')->nullable();
	        $table->float('price')->nullable();
	        $table->double('mat')->nullable();
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
        Schema::dropIfExists('computo_price_list_rows');
    }
}
