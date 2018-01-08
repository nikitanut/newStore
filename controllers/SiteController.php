<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        try {
            // Список категорий для header
        $categories = Category::getCategoriesList();

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;            
        } catch (Exception $exc) {
            $adminEmail = 'prokat83@inbox.ru';
            $headers = 'From: noresponse@prokat83.ru' . "\r\n"
                        . "Content-Type: text/html; charset=UTF-8\r\n";
            $message = 'Отсутствует подключение к базе данных: ' . $exc->getTraceAsString();
            $subject = 'Ошибка!';                
            mail($adminEmail, $subject, $message, $headers);
            echo 'К сожалению, на данный момент имеются неполадки в работе сайта. Попробуйте зайти позднее.';
        }

        
    }

    /**
     * Action для страницы "Контакты"
     */
    public function actionContact()
    {
        // Список категорий для header
        $categories = Category::getCategoriesList();
        
        $userEmail = false;
        $userText = false;
        $result = false;
                
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userName = $_POST['name'];
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору 
                $adminEmail = 'prokat83@inbox.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $headers = 'From: noresponse@prokat83.ru' . "\r\n"
                        . "Content-Type: text/html; charset=UTF-8\r\n";
                $result = mail($adminEmail, $subject, $message, $headers);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
    
    /**
     * Action для страницы "О магазине"
     */
    public function actionCondition()
    {
        // Список категорий для header
        $categories = Category::getCategoriesList();
        // Подключаем вид
        require_once(ROOT . '/views/condition/index.php');
        return true;
    }

}
