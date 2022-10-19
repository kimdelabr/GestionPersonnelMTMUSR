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
