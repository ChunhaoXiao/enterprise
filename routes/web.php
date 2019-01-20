<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Laravel\Socialite\Facades\Socialite;
Route::get('aa', function(){
	$ss = "zczNzM3M";
	//$ss = base64_encode('sdfdsfsfsdfdfsdfsd');
	$ss = "zOzD8LWz1tDR6w==";
	$yw = base64_decode($ss);
	if(mb_check_encoding($yw))
	{
		$res = $yw;
	}
	else
	{
		echo 'asdasdasd:';
		$res = iconv('GB18030', 'UTF-8', $yw);
	}
	dd($res);




	//dump($yw);
	//echo mb_detect_encoding($yw);
	dump(mb_check_encoding($yw));


	$zw = "asdasdasd";
	$zwcode = base64_encode($zw);
	$re  = base64_decode($zwcode);
	dump(mb_check_encoding($re));
	//dump($zwcode);

	//$charset = mb_detect_encoding($ss);
	//dump($charset);
	//$re = base64_decode($zwcode);
	//echo mb_detect_encoding($re);



	//$charset = mb_detect_encoding($re);
	//dump($charset);
	//$res = iconv("GBK", "UTF-8", $re);
	//dump($res);
	//var_dump(iconv_get_encoding('all'));
	//$re = imap_base64($ss);
	//dump($re);
	//dump($ss);
	//$str = iconv_mime_decode($ss);
	//dump($str);
	//dump(base64_decode($str));
});

// Route::get('wxlogin', function(){

// 	return Socialite::with('weixin')->redirect();
// });

Route::group(['namespace' => 'Home', 'middleware' => 'title.set'], function(){
	Route::get('/', 'IndexController@index');
	Route::get('/products', 'ProductsController@index')->name('home.product.list');
	Route::get('/productdetails/{product}', 'ProductsController@show')->name('home.product.show');
	Route::get('/news', 'NewsController@index')->name('home.news.index');
	Route::get('/news/show/{news}', 'NewsController@show')->name('home.news.show');
	Route::get('/about/{type}', 'AboutController@index')->name('home.about');
	Route::get('/message', 'MessageController@create')->name('message.create');
	Route::post('message', 'MessageController@store')->name('message.store');
	Route::get('/downloads', 'DownloadController@index')->name('download.index');
	Route::get('/downloads/{id}/{action}', 'DownloadController@show')->name('download.show');
	Route::name('home.')->group(function(){
		Route::resource('cases', 'CasesController')->only('index', 'show');
	});

	Route::post('product/{id}/comment', 'ProductCommentController@store')->name('comment.store');
	Route::post('commentreply', 'CommentReplyController@store')->name('comment.reply');
	Route::delete('comment/{id}', 'ProductCommentController@destroy')->name('comment.destroy');

	Route::resource('thumbs', 'CommentReplyThumbController')->only('store', 'destroy');

	Route::get('notifications', 'NotificationController@index')->name('notifications.index');

	//用户注册

	
});

//管理员的登录
Route::get('admin/login', 'Admin\LoginController@showLogin')->name('showlogin');
Route::post('admin/login', 'Admin\LoginController@login')->name('admin.login');
Route::get('admin/changpassword', 'Admin\LoginController@showChangePassword')->name('passwordchange.show');
Route::put('admin/changpassword', 'Admin\LoginController@updatePassword')->name('password.update');
Route::delete('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' =>'auth:admin'],function(){
	Route::get('/', 'IndexController@index');

	Route::prefix('products')->group(function(){
		Route::resource('categories', 'CategoryController');
	    Route::resource('properties', 'PropertyController');
	    Route::resource('products', 'ProductController');

	    Route::get('product/pictures/{product}', 'ProductPictureController@index')->name('productpictures.index');
	    Route::put('/productpicture/{picture}', 'ProductPictureController@update')->name('productpictures.update');
	});

	Route::prefix('content')->group(function(){
		Route::resource('cultures', 'CultureController');
	    Route::resource('abouts', 'AboutController')->except('show');
	    Route::resource('links', 'LinksController');
	    Route::get('/download/{id}', 'DownloadController@show')->name('file.download');
	    Route::resource('downloads', 'DownloadController');
	    Route::resource('news', 'NewsController');
	    Route::resource('cases', 'CasesController');
	    Route::get('messages', 'MessagesController@index')->name('messages.index');
	    Route::get('messages/{message}', 'MessagesController@show')->name('messages.show');
	});
	
	Route::post('image/upload', 'AboutController@ajaxUpload')->name('image.upload');
	Route::prefix('config')->group(function(){
		Route::get('configs/create', 'ConfigController@create')->name('config.create');
		Route::post('configs/save', 'ConfigController@store')->name('config.store');
		Route::resource('navigators', 'NavigatorsController');
		Route::get('carousels/create', 'CarouselsController@create')->name('carousels.create');
		Route::post('carousels/store', 'CarouselsController@store')->name('carousels.store');
		Route::resource('carousels', 'CarouselsController');
		//Route::delete('carousels/{carousel}', 'CarouselsController@destroy')->name('carousels.destroy');
		Route::get('clear/cache', 'ConfigController@edit')->name('cacheclearform.show');
		Route::post('clear/cache', 'ConfigController@destroy')->name('cache.flush');
	});

	Route::prefix('users')->group(function(){
		Route::resource('users', 'UserController');
	});

});




Route::get('/a', function(){
	$arr = [['name' => 'zs', 'age' => 20],['name' =>'lisi', 'age' => 19],['name' => 'ww','age' => 20]];
	$n = array_column($arr, 'age', 'name');
	dump($n);
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
