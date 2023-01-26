<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Creo la colonna per la foreign key
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            // E faccio l'associazione
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Dissocio la foreign key
            $table->dropForeign(['type_id']);
            // Cancello la colonna
            $table->dropColumn('type_id');
        });
    }
};
