<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_roles', function (Blueprint $table) {
            $table->id();
            $table->text('name');
			$table->text('slug');
            $table->text('color');
            $table->timestamps();
        });

        Schema::create('anagrafiche_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anagrafica_id')->unsigned();
            $table->foreign('anagrafica_id')->references('id')->on('anagrafiche')->onDelete('cascade');
            $table->bigInteger('subject_role_id')->unsigned();
            $table->foreign('subject_role_id')->references('id')->on('subject_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('anagrafiche_roles', function (Blueprint $table) {
            $table->dropForeign(['anagrafica_id']);
            $table->dropColumn('anagrafica_id');
            $table->dropForeign(['subject_role_id']);
            $table->dropColumn('subject_role_id');
        });
        Schema::dropIfExists('anagrafiche_roles');
        Schema::dropIfExists('subject_roles');
    }
}
