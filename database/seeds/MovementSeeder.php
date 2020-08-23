<?php

use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movements = [
            'Entrada de Dinero',
            'Salida de Dinero'
        ];
         
        foreach ($movements as $value) {
            \App\TypeMovement::create([
                'name' => $value
            ]);
        }
    }
}
