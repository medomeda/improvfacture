<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 50);
            $table->string('titre', 10);
            $table->integer('typetier_id');
            $table->string('nom', 100);
            $table->string('prenoms', 255)->nullable();
            $table->string('numerocompte', 50)->nullable();
            $table->dateTime('datenaissance')->nullable();
            $table->string('telephone', 50)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('boitepostale', 100)->nullable();
            $table->tinyInteger('echeance')->nullable();
            $table->boolean('assujetva')->nullable()->default(true);
            $table->integer('tva_id')->unsigned()->nullable();
            $table->foreign('tva_id')->references('id')->on('tvas');
            $table->string('representantnomprenoms', 150)->nullable();
            $table->string('representantcontacts', 30)->nullable();
            $table->boolean('inactif')->nullable()->default(false);

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
        Schema::dropIfExists('tiers');
    }
}
