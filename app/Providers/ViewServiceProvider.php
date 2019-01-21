<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            $categories = Cache::remember('categories', 10, function(){
                return \App\Models\Category::withCount('products')->get();
            });

            $properties = Cache::remember('properties', 10, function(){
                return \App\Models\Property::all();
            });

            $contacts = \App\Models\About::contact()->first();
            $contacts = !empty($contacts) ? $contacts->content : [];

            $view->with('all_categories', $categories);
            $view->with('all_properties', $properties);
            $view->with('contacts', $contacts);
        });

        View::composer('home.common', function($view){
            $menus = Cache::remember('menus', 10, function(){
                return \App\Models\Navigator::orderBy('order_num')->get();
            });

            $view->with('menus', $menus);
        });

        View::composer('home.index.index', function($view){
            //获取首页 carousel 图片
            $carousels = Cache::remember('carousels', 10, function(){
                return \App\Models\Carousel::orderBy('order')->whereEnabled(1)->get();
            });
            $view->with('carousels', $carousels);

            //首页展示的产品
            $products = \App\Models\Product::latest()->limit(4)->get();
            //首页展示的新闻
            $news = \App\Models\News::latest()->limit(5)->get();
            //友情链接
            $links = Cache::remember('links', 10, function(){
                return \App\Models\Link::enabled()->get();
            });

            //首页展示的经典案例
            $cases = Cache::remember('cases', 10, function(){
                return \App\Models\Cases::latest()->limit(4)->get();
            });

            $view->with('news', $news);
            $view->with('products', $products);
            $view->with('links', $links);
            $view->with('cases', $cases);
        });

        View::composer('admin.index.index', function($view){
            $sum['category_count'] = \App\Models\Category::count();
            $sum['product_count'] = \App\Models\Product::count();
            $sum['message_count'] = \App\Models\Message::count();
            //Cache::forever('summary', $sum);
            $view->with('summary', $sum);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    // protected function getData($type)
    // {
    //     if(!$data = Cache::get($type))
    //     {
    //         $model = ucfirst($type);
    //         $class = "App\Models\\$model";
    //     }
    // }

    
}
