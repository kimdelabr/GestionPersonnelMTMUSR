<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            ["nom"=>"Admin"],
            ["nom"=>"Manager"],
            ["nom"=>"Staff"],
            ["nom"=>"User"]
        ]);
    }
}
