<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_folders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('folder_document_id')->unsigned();
            $table->foreign('folder_document_id')->references('id')->on('folder_documents')->onDelete('cascade');
            $table->string('folder_type');
            $table->string('assev_t_status')->default(0);
	        $table->string('assev_f_status')->default(0);
	        $table->string('bank_status')->default(0);
            $table->text('name');
            $table->string('role');
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
        Schema::dropIfExists('sub_folders');
    }
}
