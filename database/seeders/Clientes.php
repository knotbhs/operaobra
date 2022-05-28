<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Clientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            "name" => "ALSUKKAR BIOTECNOLOGIA INDUSTRIAL LTDA",
            "cnpj" => "10497341000178",
            "email" => "qwe@23.com",
            "telefone" => "16999399999",
            "endereco" => json_encode(["rua" => "Rua Gildo Ignacio", "numero" => "481", "bairro" => "NOVA RIBEIRANIA", "cidade" => "RIBEIRAO
            PRETO", "estado" => "SP", "cep" => "14096-670"]),
            "obs" => ""
        ]);
    }
}
