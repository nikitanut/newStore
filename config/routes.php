<?php

return array(
    
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
     
    'catalog' => 'catalog/index', // actionIndex в CatalogController
   
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
    
// Корзина:
    'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', //actionDelete в CartController
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    // Управление товарами:
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    //Управление ценами:    
    'admin/price/create' => 'adminPrice/create',
    'admin/price/update/([0-9]+)/([0-9]+)' => 'adminPrice/update/$1/$2',
    'admin/price/delete/([0-9]+)/([0-9]+)'=>'adminPrice/delete/$1/$2',
    'admin/price' => 'adminPrice/index',
    // Панель админа
    'admin' => 'admin/index',
    //О магазине:
    'contact' => 'site/contact',
    'condition' => 'site/condition',
    // Главная страница    
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
    
);