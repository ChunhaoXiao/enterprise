<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	['name' => '分类A'],
        	['name' => '分类B'],
        	['name' => '分类C'],
        	['name' => '分类D'],
        ];
        foreach($categories as $v)
        {
        	Category::firstOrCreate($v);
        }
    }
}
