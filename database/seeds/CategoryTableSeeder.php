<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Category::insert([
            ['name'=>'Notebook','slug'=>'note-book','created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Planners','slug'=>'planners','created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'TODO List','slug'=>'todo-list','created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Handmade','slug'=>'handmade','created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Plant Pot','slug'=>'plant-pot','created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Wood','slug'=>'wood','created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Cups and plates','slug'=>'cups-plats','created_at'=>$now, 'updated_at'=>$now]
            ]);
    
    }
}
