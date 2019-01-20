<?php

use Illuminate\Database\Seeder;
use App\Models\Navigator;

class NavigatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name' => '关于我们', 'link' => 'about/overview', 'order_num' =>1],
        	['name' => '产品中心', 'link' => 'products', 'order_num' =>2],
        	['name' => '新闻动态', 'link' => 'news', 'order_num' =>3],
        	['name' => '销售网络', 'link' => 'about/sales', 'order_num' =>4],
            ['name' => '经典案例', 'link' => 'cases', 'order_num' =>5],
        	['name' => '资料下载', 'link' => 'downloads', 'order_num' =>5],
        	['name' => '客户留言', 'link' => 'message', 'order_num' =>6],
        	['name' => '联系我们', 'link' => 'about/contact', 'order_num' =>7],
        ];
        foreach($data as $item)
        {
        	Navigator::firstOrCreate($item);
        }
    }
}
