<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Cliente::create(
        [
           'nome' => 'marcos',
           'email' => 'fgshshs@gmail.com',
           'endereco'=> 'rua x',
           'logradouro'=> 'rua z',
           'cep' => '36363',
           'bairro' => 'logo'

        ]
      );
    }
}
