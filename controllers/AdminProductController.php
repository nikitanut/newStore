<?php

/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase {

    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex() {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список товаров
        $productsList = Product::getProductsList();
        $categoryList = Category::getCategoriesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate() {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы            
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['characteristics'] = $_POST['characteristics'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            if ($_POST['time'] != NULL and $_POST['price'] != NULL) {
                $options['time'] = $_POST['time'];
                $options['price'] = $_POST['price'];
            }

            if ($_POST['time1'] != NULL and $_POST['price1'] != NULL) {
                $options['time1'] = $_POST['time1'];
                $options['price1'] = $_POST['price1'];
            }

            if ($_POST['time2'] != NULL and $_POST['price2'] != NULL) {
                $options['time2'] = $_POST['time2'];
                $options['price2'] = $_POST['price2'];
            }

            if ($_POST['time3'] != NULL and $_POST['price3'] != NULL) {
                $options['time3'] = $_POST['time3'];
                $options['price3'] = $_POST['price3'];
            }

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Product::createProduct($options);
                if ($_POST['time'] != NULL and $_POST['price'] != NULL) {
                    Price::createPrice($id, $options['time'], $options['price']);
                }
                if ($_POST['time1'] != NULL and $_POST['price1'] != NULL) {
                    Price::createPrice($id, $options['time1'], $options['price1']);
                }
                if ($_POST['time2'] != NULL and $_POST['price2'] != NULL) {
                    Price::createPrice($id, $options['time2'], $options['price2']);
                }
                if ($_POST['time3'] != NULL and $_POST['price3'] != NULL) {
                    Price::createPrice($id, $options['time3'], $options['price3']);
                }
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id) {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);

        //Получаем цены товара
        $prices = Price::getPriceListById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['characteristics'] = $_POST['characteristics'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            
            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {
                for ($i = 0; $i < count($prices); $i++) {
                    $time = $_POST["time$i"];
                    $price = $_POST["price$i"];
                    print_r($time);
                    print_r($price);
                    Price::updatePrice($id, $time, $price, $prices[$i]['price']);
                }

                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id) {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

}
