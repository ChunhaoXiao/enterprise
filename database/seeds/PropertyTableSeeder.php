<?php

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
        	['name' => '尺寸', 'order' => 0],
        	['name' => '颜色', 'order' => 1],
        	['name' => '重量', 'order' => 2],
        	['name' => '材质', 'order' => 3],
        	['name' => '型号', 'order' => 4],
        	['name' => '上市时间', 'order' => 5],
        ];
        foreach ($properties as $key => $value) {
        	Property::firstOrCreate($value);	
        }
    }
}
