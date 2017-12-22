<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Редактировать товар #<?php echo $id; ?></h4>

            <br/>
            <div class="col-lg-12">
                <div class="login-form" class="form-group">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="col-lg-4">
                            <div class="login-form" class="form-group">

                                <p>Название товара</p>
                                <input class="form-control" type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

                                <p>Категория</p>
                                <select name="category_id">
                                    <?php if (is_array($categoriesList)): ?>
                                        <?php foreach ($categoriesList as $category): ?>
                                            <option value="<?php echo $category['id']; ?>" 
                                                    <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                                        <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <br/><br/>

                                <p>Наличие на складе</p>
                                <select name="availability">
                                    <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                                    <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                                </select>

                                <br/><br/><br/>

                                <p>Изображение товара</p>
                                <img src="<?php echo Product::getImage($product['id']); ?>" width="35%" alt="" />
                                <input type="file" name="image" placeholder="" value="<?php //echo $product['image'];                       ?>">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="login-form">
                                <p>Характеристики</p>
                                <textarea name="characteristics" style="margin-bottom: 5px; height: 250px; width: 100%;"><?php echo $product['characteristics'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="login-form">
                                <p>Детальное описание</p>
                                <textarea name="description" style="margin-bottom: 5px; height: 250px; width: 100%;"><?php echo $product['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="login-form">
                                <p>Новинка</p>
                                <select name="is_new">
                                    <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                                    <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                                </select>

                                <br/><br/>

                                <p>Рекомендуемые</p>
                                <select name="is_recommended">
                                    <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                                    <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                                </select>

                                <br/><br/>

                                <p>Статус</p>
                                <select name="status">
                                    <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                                    <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                                </select>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="col-lg-4">
                            <div class="login-form" class="form-group">
                                <p>Время аренды</p>
                                <?php if (is_array($prices)): ?>
                                    <?php
                                    $i = 0;
                                    foreach ($prices as $price):
                                        ?>
                                        <input class="form-control" type="text" name=<?php echo "time$i" ?> placeholder="" value="<?php echo $price['time']; ?>">
                                        <span style='padding-left:10px;'> </span>
                                        <?php
                                        $i++;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="login-form" class="form-group">
                                <p>Цена</p>
                                <?php if (is_array($prices)): ?>
                                    <?php
                                    $i = 0;
                                    foreach ($prices as $price):
                                        ?>
                                        <input class="form-control" type="text" name=<?php echo "price$i" ?> placeholder="" value="<?php echo $price['price']; ?>">
                                        <span style='padding-left:10px;'> </span>
                                        <?php
                                        $i++;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-10" style="margin-left:10%; margin-top:2%;">
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

