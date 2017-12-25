<?php

class AdminPriceController extends AdminBase {

    public function actionIndex() {

        //Проверка доступа
        self::checkAdmin();

        //Получаем список цен товаров
        $priceList = Price::getPriceList();
        $productList = Product::getProductsList();
        //Подключаем вид
        require_once (ROOT . "/views/admin_price/index.php");
        return TRUE;
    }

    /**
     * Action для страницы "Добавить цену"
     */
    public function actionCreate() {
        // Проверка доступа
        self::checkAdmin();

        $productList = Product::getProductsList();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $prod_id = $_POST['prod_id'];
            $time = $_POST['time'];
            $price = $_POST['price'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($time) || empty($time)) {
                $errors[] = 'Заполните время аренды';
            }
             if (!isset($price) || empty($price)) {
                $errors[] = 'Заполните цену';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую цену
                Price::createPrice($prod_id, $time, $price);

                // Перенаправляем пользователя на страницу управлениями ценами
                header("Location: /admin/price");
            }
        }
        
        require_once(ROOT . '/views/admin_price/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать Цену"
     */
    public function actionUpdate($prod_id, $price) {
        // Проверка доступа
        self::checkAdmin();


        // Получаем данные о конкретной цене
        $product = Product::getProductById($prod_id);
        $prices = Price::getPriceByIdAndPrice($prod_id, $price);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            
            $time = $_POST['time'];
            $price = $_POST['price'];

            // Сохраняем изменения
            
            Price::updatePrice($prod_id, $time, $price, $prices['price']);
            // Перенаправляем пользователя на страницу управлениями ценами
            header("Location: /admin/price");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_price/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить цену"
     */
    public function actionDelete($prod_id, $price) {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем цену
            Price::deletePriceById($prod_id, $price);

            // Перенаправляем пользователя на страницу управлениями ценами
            header("Location: /admin/price");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_price/delete.php');
        return true;
    }

}
