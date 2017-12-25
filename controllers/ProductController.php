<?php

class ProductController
{
    /**
     * Action для страницы "Товар"
     */
    public function actionView($productId)
    {
        // Создание массива категорий
        $categories = array();
        $categories = Category::getCategoriesList();
        
        // Получение товара по id
        $product = Product::getProductById($productId);        
        
        // Получение цен товара
        $prices = Product::getPriceListById($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;
    }

}