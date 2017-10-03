<?php

class Price {

    public static function getPriceList() {

        $db = Db::getConnection();

        $result = $db->query('SELECT prod_id, time, price FROM price');
        $priceList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $priceList[$i]['prod_id'] = $row['prod_id'];
            $priceList[$i]['time'] = $row['time'];
            $priceList[$i]['price'] = $row['price'];
            $i++;
        }
        return $priceList;
    }

    public static function createPrice($prod_id, $time, $price) {
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO price '
                . '(prod_id, time, price)'
                . 'VALUES '
                . '(:prod_id, :time, :price)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $result->bindParam(':time', $time, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updatePrice($prod_id, $time, $price, $prices) {
        $db = Db::getConnection();

        $sql = "UPDATE price SET time=:time, price=:price WHERE prod_id=:prod_id AND price=:prices";
        $result = $db->prepare($sql);
        $result->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $result->bindParam(':time', $time, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':prices', $prices, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getPriceByIdAndPrice($prod_id, $price) {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM price WHERE prod_id=:prod_id and price=:price';

        $result = $db->prepare($sql);
        $result->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
// Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function deletePriceById($prod_id, $price) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM price WHERE prod_id = :prod_id AND price=:price';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        return $result->execute();
    }
    
        public static function getPriceListByProducts($products)
    {
        // Соединение с БД
        $db = Db::getConnection();

        
        $where = ""; // Строка с WHERE
        for ($i = 0; $i <count($products); $i++)
        {
            $where .= "prod_id = :prod_id".$i;
            if ($i+1 != count($products)) // Если последний товар, то не добавлять OR в запрос
                $where .= " OR ";
        }
        // Текст запроса к БД
        $sql = 'SELECT prod_id, time, price FROM price WHERE '. $where . ' ORDER BY price';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        for ($i=0; $i <count($products); $i++)
        {
            $result->bindParam(':prod_id'.$i, $products[$i]['id'], PDO::PARAM_INT);
        }
        // Выполнение команды
        $result->execute();
        
        // Получение и возврат результатов
        $i = 0;
        $prices = array();
        while ($row = $result->fetch()) {
            $prices[$i]['prod_id'] = $row['prod_id'];
            $prices[$i]['time'] = $row['time'];
            $prices[$i]['price'] = $row['price'];
            $i++;
        }
        return $prices;
    }

    /**
     * Возвращает список цен указанных товаров
     * @param type $products <p>Массив с товарами</p>
     * @return type <p>Массив с ценами</p>
     */
    public static function getPriceListById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT prod_id, time, price FROM price WHERE prod_id = :prod_id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':prod_id', $id, PDO::PARAM_INT);
        // Выполнение команды
        $result->execute();
        
        // Получение и возврат результатов
        $i = 0;
        $prices = array();
        while ($row = $result->fetch()) {
            $prices[$i]['prod_id'] = $row['prod_id'];
            $prices[$i]['time'] = $row['time'];
            $prices[$i]['price'] = $row['price'];
            $i++;
        }
        return $prices;
    }

}
