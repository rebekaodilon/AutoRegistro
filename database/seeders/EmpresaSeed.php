<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Veiculo;
use App\Models\Multa;

class EmpresaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::factory()->count(1)->has(
            Veiculo::factory()->count(2)->has(
                Multa::factory()->count(2)
            )
        )->create();
    }
}
