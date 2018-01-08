<?php

/**
 * Контроллер CartController
 * Корзина
 */
class CartController {

    /**
     * Action для добавления товара в корзину синхронным запросом<br/>
     * (для примера, не используется)
     * @param integer $id <p>id товара</p>
     */
    public function actionAdd($id) {
        // Добавляем товар в корзину
        Cart::addProduct($id);

        // Возвращаем пользователя на страницу с которой он пришел
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
     * @param integer $id <p>id товара</p>
     */
    public function actionAddAjax($id) {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        echo Cart::addProduct($id);
        return true;
    }

    /**
     * Action для добавления товара в корзину синхронным запросом
     * @param integer $id <p>id товара</p>
     */
    public function actionDelete($id) {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    /**
     * Action для страницы "Корзина"
     */
    public function actionIndex() {
        // Список категорий для header
        $categories = Category::getCategoriesList();

        // Получим товары в корзине
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Если в корзине есть товары, получаем полную информацию о товарах для списка
            // Получаем массив только с идентификаторами товаров
            $productsIds = array_keys($productsInCart);

            // Получаем массив с полной информацией о необходимых товарах
            $products = Product::getProductsByIds($productsIds);

            // Получаем массив со стоимостью
            $prices = Product::getPriceListByProducts($products);
        }

        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    /**
     * Action для страницы "Оформление покупки"
     */
    public function actionCheckout() {
        // Получаем данные из корзины      
        $productsInCart = Cart::getProducts();

        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            header("Location: /");
        }

        // Список категорий для header
        $categories = Category::getCategoriesList();

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['name'];
            $userPhone = $_POST['telephone'];
            $date = date('Y-m-d', strtotime($_POST['datetimepicker']));
            $userEmail = $_POST['email'];
            $userComment = $_POST['comment'];
            $address = $_POST['address'];
            $index_price = array();
            for ($i = 0; $i < count($productsIds); $i++) {
                $index_price[$productsIds[$i]] = $_POST['time' . $productsIds[$i]]; // создание массива [id] = time
            }
            $userId = User::checkUserData($userPhone);

            if (!$userId) {
                User::register($userPhone, $userName, $userEmail);
                $userId = User::checkUserData($userPhone);
            }
            $adminEmail = 'nikitanut@gmail.com';
            $headers = 'From: noresponse@prokat83.ru' . "\r\n"
                    . "Content-Type: text/html; charset=ISO-8859-1\r\n";
            try {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                Order::save($userName, $userPhone, $address, $userComment, $userId, $date, $index_price);
                $date = date('d.m.Y', strtotime($date));
                $message = '';
                for ($i = 0; $i < count($productsIds); $i++) {
                    $message .= ($i + 1) . '. ' . $products[$i]['name'] . ' - ' . $index_price[$productsIds[$i]] . '<br/>';
                }
                $message = 'Имя: ' . $userName . '<br/> Телефон: ' . $userPhone . '<br/> Адрес доставки: ' . $address . '<br/> Комментарии к заказу: ' . $userComment . '<br/> Желаемая дата доставки: ' . $date . ' <br/><br/>' . $message;
                $subject = 'Новый заказ!';
                /*$headers = 'From: noresponse@prokat83.ru' . "\r\n"
                        . "Content-Type: text/html; charset=utf-8";*/

                // Если заказ успешно сохранен
                // Оповещаем администратора о новом заказе по почте   
                mail($adminEmail, $subject, $message, $headers);

                // Очищаем корзину
                Cart::clear();
            } catch (Exception $exc) {
                echo 'К сожалению, заказ не осуществлён. Попробуйте позже.';
                $message = 'Пользователь не смог заказать товар! ' . $exc->getTraceAsString();
                $subject = 'Ошибка!';
                mail($adminEmail, $subject, $message, $headers);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
