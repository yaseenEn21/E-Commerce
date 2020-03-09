<?php

use Illuminate\Database\Seeder;
use CategoryTableSeeder as CTS;
use ProductsTableSeeder as PTS;
use CouponsTableSeeder as CoTS;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        
    }
}
