<?php include ROOT . '/views/layouts/header.php'; ?>
<h2>Корзина</h2>
<?php if ($productsInCart): ?>
    <section class="cart">
        <table>
            <thead>

                <tr>
                    <th>&nbsp;</th>
                    <th>Название</th>
                    <th>Срок аренды</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            Тут картинка
                        </td>
                        <td>
                            <h3><a href="/product/<?php echo $product['id']; ?>">
                                    <?php echo $product['name']; ?>
                                </a></h3>
                        </td>
                        <td>
                            <h3>
                                <select>
                                    <option selected disabled="Выберите срок аренды">Выберите срок аренды</option>
                                    <?php foreach ($prices as $price):
                                            if ($product['id'] == $price['prod_id']):?>
                                    <option value="<?php echo $price['price'];?>"><?php echo $price['time'] . " - " . $price['price'] . "р.";?></option>
                                        <?php endif;endforeach;?>
                                </select>
                            </h3>
                        </td>
                        <td>
                            <h4><a href="/cart/delete/<?php echo $product['id']; ?>">
                                    <i>×</i>
                                </a></h4>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <h2>Общая стоимость, руб:</h2>
            <h2><?php echo "Пока 0"; ?></h2>
            </tbody>
        </table>
        <a class="btn" href="/cart/checkout"><i></i> Оформить заказ</a>

    </section>
<?php else: ?>
    <p>Корзина пуста</p>

    <a class="btn btn-default checkout" href="/"><i></i> Вернуться к покупкам</a>
<?php endif; ?>
<?php include ROOT . '/views/layouts/footer.php'; ?>