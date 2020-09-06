<?php

use Illuminate\Database\Seeder;

class TypePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movements = [
            'Contado',
            'Credito',
            'Transferencia Bancaria',
            'Sinpagar'
        ];
         
        foreach ($movements as $value) {
            \App\TypePayment::create([
                'name' => $value
            ]);
        }
    }
}
