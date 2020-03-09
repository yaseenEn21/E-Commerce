<?php

use Illuminate\Database\Seeder;
use App\Coupon;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create(
            [
            'code'=>'yaseen2020',
            'type'=>'fixed',
            'value'=>20
        ]);
        Coupon::create(
            [
            'code'=>'yaseen',
            'type'=>'percent',
            'percent_off'=>20
        ]);
    
}
}
