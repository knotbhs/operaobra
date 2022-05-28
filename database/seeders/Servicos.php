<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Servicos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
            'orcamento_id' => 1,
            'name' => "Manutenção",
            'valor' => "175.50",
            'descricao' => "Primeira – Entrada 22."
        ]);
    }
}
