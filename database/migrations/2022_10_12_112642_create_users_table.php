<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('phone');
            $table->string('annee_prise_service');
            $table->string('annee_cessation_service');
            $table->string('motif_cessation_service')->nullable();
            $table->string('rib');
            $table->boolean('is_enable')->default(true);
            $table->string('motif_disable')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
             //$table->tinyInteger('role')->default(0);
            /* Users: 0=>User, 1=>Staff, 2=>Manager, 3=>Admin */
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('categorie_id')->unsigned();
            $table->bigInteger('emploi_id')->unsigned();
            $table->bigInteger('fonction_id')->unsigned();
            $table->bigInteger('structure_id')->unsigned();
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('banque_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('emploi_id')->references('id')->on('emplois');
            $table->foreign('fonction_id')->references('id')->on('fonctions');
            $table->foreign('structure_id')->references('id')->on('structures');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('banque_id')->references('id')->on('banques');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
