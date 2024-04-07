<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference', 100)->nullable();
            $table->string('designation',255);
            $table->text('description')->nullable();
            $table->float('prixachat')->nullable()->default(0);
            $table->float('prixvente')->nullable()->default(0);
            $table->integer('stockmini')->unsigned()->nullable()->default(0);
            $table->integer('stockmaxi')->unsigned()->nullable()->default(0);
            $table->integer('stockseuil')->unsigned()->nullable()->default(0);
            $table->string('photo')->nullable();
            $table->boolean('inactif')->nullable()->default(false);

            $table->integer('categorie_id')->unsigned()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories');

            $table->integer('typearticle_id')->unsigned()->nullable();
            $table->foreign('typearticle_id')->references('id')->on('typearticles');

            $table->integer('unite_id')->unsigned()->nullable();
            $table->foreign('unite_id')->references('id')->on('unites');

            $table->integer('tva_id')->unsigned()->nullable();
            $table->foreign('tva_id')->references('id')->on('tvas');

            $table->integer('marque_id')->unsigned()->nullable();
            $table->foreign('marque_id')->references('id')->on('marques');

            $table->integer('modele_id')->unsigned()->nullable();
            $table->foreign('modele_id')->references('id')->on('modeles');
           
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
        Schema::dropIfExists('articles');
    }
}
