<?php 
return 
[
	'menus' => 
	[
		[
			'top' => '产品相关',
			'prefix' => 'products',
		    'sub' => [
				['name' => '产品分类', 'url' =>'/admin/products/categories'],
				['name' => '产品管理', 'url' =>'/admin/products/products'],
				//['name' => '关于我们', 'url' =>'about'],
				['name' => '属性管理', 'url' => '/admin/products/properties'],
			]	
		],

		[
			'top' => '内容管理',
			'prefix' => 'content',
			'sub' => [
				['name' => '资料下载', 'url' => '/admin/content/downloads'],
				['name' =>'关于我们', 'url' => '/admin/content/abouts'],
				['name' => '经典案例', 'url' => '/admin/content/cases'],
				// ['name' => '企业文化', 'url' => ''],
				// ['name' => '联系我们', 'url' =>''],
				['name' => '新闻动态', 'url' => '/admin/content/news'],

				['name' => '用户留言', 'url' => '/admin/content/messages'],
				['name' => '友情链接', 'url' => '/admin/content/links']
			]
		],

		[
			'top' => '用户管理',
			'prefix' => 'users',
			'sub' => [
				['name' => '用户管理', 'url' => '/admin/users/users'],
			]
		],

		[
			'top' => '系统设置',
			'prefix' => 'config',
			'sub' => [
				['name' => '基本设置', 'url' => '/admin/config/configs/create'],
				['name' => '导航菜单', 'url' => '/admin/config/navigators'],
				['name' => '轮播图片', 'url' => '/admin/config/carousels'],
				['name' => '清除缓存', 'url' => '/admin/config/clear/cache'],
			]
		],
	],

	'configs' => [
		['name' => 'name', 'label' => '网站名称', 'type' => 'text'],
		['name' => 'keywords','label' => '关键字', 'type' => 'text'],
		['name' =>'description', 'label' => '描述', 'type' => 'textarea'],
		['name' => 'logo', 'label' => '网站logo', 'type' => 'file'],
	],

	'about' => [
		'overview' => '公司简介',
		'sales' => '销售网络',
		'scene' => '公司内景',
		'contact' => '联系我们',
	],

	'news' => [
		'company' => '公司新闻',
		'industry' => '行业新闻',
		'case' => '典型案例',
	],

	'contacts' => [

		'address' => ['name' => '地址', 'type' => 'text'],
		'phone' => ['name' => '电话', 'type' => 'text'],
		'fax' => ['name' => '传真', 'type' => 'text'],
		'email' => ['name' => 'email','type' => 'text'],
		'wechat' => ['name' => '微信', 'type' => 'file'],
	],

	'title' => [
		'news' => '新闻动态',
		'about/overview' => '关于我们',
		'products' => '产品列表',
		'productdetails' => '产品详情',
		'message' => '客户留言',
		'about/sales' => '销售网络',
		'about/contact' =>'联系我们',
		'downloads' => '资料下载',
		'cases' => '经典案例',
		'register' => '用户注册',
	],
];