<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeEnvaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoenvase = [
            'Bimbo 2L',
            'Bimbo 3L',
            'Bimbo 1L',
            'Galon 10L',
            'Galon 5L',
            'Galon 20L'
        ];
         
        foreach ($tipoenvase as $value) {
            \App\Type::create([
                'nombre' => $value
            ]);
        }
    }
}
