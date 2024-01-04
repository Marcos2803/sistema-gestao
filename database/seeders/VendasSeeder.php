<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venda::create(
            [
               'numero_da_venda' => 1,
               'produto-id' => 2,
               'cliente-id' => 5
            ]
        );
    
    }
}
