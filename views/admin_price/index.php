<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление ценами</li>
                </ol>
            </div>

            <a href="/admin/price/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить цену</a>

            <h4>Список цен товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>Название товара</th>
                    <th>Время аренды</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($priceList as $price): ?>
                    <tr>
                        <td><?php
                            //Получаем названия товара вместе ID
                            foreach ($productList as $product):

                                if ($price['prod_id'] == $product['id']) {
                                    echo $product['name'];
                                }

                            endforeach;
                            ?></td>
                        <td><?php echo $price['time']; ?></td>
                        <td><?php echo $price['price']; ?></td>
                        <td><a href="/admin/price/update/<?php echo $price['prod_id']; ?>/<?php echo $price['price']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/price/delete/<?php echo $price['prod_id']; ?>/<?php echo $price['price']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

