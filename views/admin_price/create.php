<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление ценами</a></li>
                    <li class="active">Добавить цену</li>
                </ol>
            </div>


            <h4>Добавить новую цену</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название товара</p>
                        <select name="prod_id">
                            <?php if (is_array($productList)): ?>
                                <?php foreach ($productList as $product): ?>
                                    <option value="<?php echo $product['id']; ?>">
                                        <?php echo $product['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br> <br>
                        
                        <p>Время аренды</p>
                        <input type="text" name="time" placeholder="" value="">

                        <p>Цена</p>
                         <input type="text" name="price" placeholder="" value="">


                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

