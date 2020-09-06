<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(MovementSeeder::class);
        $this->call(TypePaymentSeeder::class);
        $this->call(TypeSaleSeeder::class);
        $this->call(TypeEnvaseTableSeeder::class);
    }
}
