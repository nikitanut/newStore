<?php

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController
{

    /**
     * Action для страницы "Каталог"
     */
    public function actionIndex()
    {
        // Список категорий для header
        $categories = Category::getCategoriesList();

        // Подключаем вид
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    /**
     * Action для страницы "Категория товаров"
     */
    public function actionCategory($categoryId, $page = 1)
    {
        // Список категорий для header
        $categories = Category::getCategoriesList();
        
        $categoryname = Category::getCategoryById($categoryId);

        // Список товаров в категории
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        // Список цен товаров
        $prices = Product::getPriceListByProducts($categoryProducts);
        
        // Список товаров в массиве
        $productsInCart = Cart::getProducts();
        
        // Общее количеcтво товаров (необходимо для постраничной навигации)
        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }

}
