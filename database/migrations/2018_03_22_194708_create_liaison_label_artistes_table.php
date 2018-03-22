<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiaisonLabelArtistesTable extends Migration
{
    public function up()
    {
        /*Schema::create('liaison_labels_artistes', function (Blueprint $table) {
            $table->integer('id_label')->unsigned();
            $table->integer('id_artiste')->unsigned();
        });

        Schema::table('liaison_labels_artistes', function($table) {
            $table->foreign('id_label')->references('id_label')->on('labels')->onDelete('cascade');
            $table->foreign('id_artiste')->references('id_artiste')->on('artistes')->onDelete('cascade');
        });*/
        Schema::create('liaison_labels_artistes', function (Blueprint $table) {
            $table->increments('id_liaison');
            $table->integer('id_label')->unsigned();
            $table->integer('id_artiste')->unsigned();
            $table->timestamps();
        });

        Schema::table('liaison_labels_artistes', function($table) {
            $table->foreign('id_label')->references('id_label')->on('labels')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('id_artiste')->references('id_artiste')->on('artistes')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'liaison_labels_artistes', function(Blueprint $table) {
            $table->dropForeign('liaison_labels_artistes_id_label_foreign');
            $table->dropForeign('liaison_labels_artistes_id_artiste_foreign');

        });
        Schema::dropIfExists('liaison_labels_artistes');
    }
}