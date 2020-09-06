<?php

use Illuminate\Database\Seeder;

class TypeSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movements = [
            'Venta',
            'Pedido'
        ];
         
        foreach ($movements as $value) {
            \App\TypeSale::create([
                'name' => $value
            ]);
        }
    }
}
