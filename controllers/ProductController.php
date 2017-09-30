<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class ProductController
{

    public function actionView($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList();
        
        $product = Product::getProductById($productId);
        
        $prices = Product::getPriceListById($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;
    }

}