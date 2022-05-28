<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Orcamentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orcamentos')->insert([
            'empresa_id' => 1,
            'cliente_id' => 1,
            'data_inicio' => "2022-01-20",
            'data_final' => "2022-01-20",
            'data_garantia' => "2022-01-20",
            'etapa' => 1,
            'forma_pagamento' => "Primeira – Entrada no ato da aprovação do orçamento de R$ 800,00.
            Segunda – Parcela de R$ 500,00 na finalização do serviço.
            Terceira e ultima parcela de R$ 500,00 na data de 24/06/2022.",
            'endereco_obra' => json_encode(["rua" => "Rua Gildo Ignacio", "numero" => "481", "bairro" => "NOVA RIBEIRANIA", "cidade" => "RIBEIRAO
            PRETO", "estado" => "SP", "cep" => "14096-670"])
        ]);
    }
}
