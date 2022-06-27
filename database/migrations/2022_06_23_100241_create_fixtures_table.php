<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('practice_id')->unsigned();
	        $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
	        $table->bigInteger('condomino_id')->unsigned()->nullable();
	        $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
	        $table->boolean('is_common')->default(false);
			$table->text('description')->nullable();
			$table->double('superficie')->nullable();
	        $table->double('trasm_ante')->nullable();
	        $table->double('trasm_post')->nullable();
	        $table->string('telaio_prima')->nullable();
	        $table->string('vetro_prima')->nullable();
	        $table->string('telaio_dopo')->nullable();
	        $table->string('vetro_dopo')->nullable();
	        $table->string('oscurante')->nullable();
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
        Schema::dropIfExists('fixtures');
    }
}
