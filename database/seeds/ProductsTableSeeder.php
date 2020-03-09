<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Product;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Product::Create([
            'name'=>'Notebook product','slug'=>'note-book-product','price'=>'15','created_at'=>$now, 'updated_at'=>$now
            ])->categories()->attach(1);
            Product::Create([
                'name'=>'Planners product','slug'=>'planners-book-product','price'=>'20','created_at'=>$now, 'updated_at'=>$now
                ])->categories()->attach(2);
                Product::Create([
                    'name'=>'TODO List product','slug'=>'todo-book-product','price'=>'12','created_at'=>$now, 'updated_at'=>$now
                    ])->categories()->attach(3);
                    Product::Create([
                        'name'=>'Handmade product','slug'=>'handmade-book-product','price'=>'18','created_at'=>$now, 'updated_at'=>$now
                        ])->categories()->attach(4);
                        Product::Create([
                            'name'=>'Plant Pot product','slug'=>'plant-pot-product','price'=>'35','created_at'=>$now, 'updated_at'=>$now
                            ])->categories()->attach(5);
                            Product::Create([
                                'name'=>'Wood product','slug'=>'wood-product','price'=>'55','created_at'=>$now, 'updated_at'=>$now
                                ])->categories()->attach(6);
                                Product::Create([
                                    'name'=>'Cups and plates product','slug'=>'plates-product','price'=>'55','created_at'=>$now, 'updated_at'=>$now
                                    ])->categories()->attach(7);
    
    }
    
}
