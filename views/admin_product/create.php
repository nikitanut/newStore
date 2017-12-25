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


            <h4>Добавить новый товар</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="col-lg-12">
                <div class="login-form" class="form-group">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="col-lg-4">
                            <div class="login-form" class="form-group">
                                <p>Название товара</p>
                                <input class="form-control" type="text" name="name" placeholder="" value="">
                                <br/>
                                <p>Категория</p>
                                <select name="category_id">
                                    <?php if (is_array($categoriesList)): ?>
                                        <?php foreach ($categoriesList as $category): ?>
                                            <option value="<?php echo $category['id']; ?>">
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>

                                <br/><br/>

                                <p>Наличие на складе</p>
                                <select name="availability">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select>

                                <br/><br/><br/>

                                <p>Изображение товара</p>
                                <img src="<?php  echo Product::getImage(0);      ?>" width="200" alt="" />
                                <input type="file" name="image" placeholder="" value="">

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="login-form">
                                <p>Детальное описание</p>
                                <textarea name="description" style="margin-bottom: 5px; height: 250px; width: 100%;"></textarea>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-lg-4">
                            <div class="login-form">
                                <p>Новинка</p>
                                <select name="is_new">
                                    <option value="1">Да</option>
                                    <option value="0" selected="selected">Нет</option>
                                </select>

                                <br/><br/>

                                <p>Рекомендуемые</p>
                                <select name="is_recommended">
                                    <option value="1">Да</option>
                                    <option value="0" selected="selected">Нет</option>
                                </select>

                                <br/><br/>

                                <p>Статус</p>
                                <select name="status">
                                    <option value="1" selected="selected">Отображается</option>
                                    <option value="0">Скрыт</option>
                                </select>
                            </div>
                        </div>

                        <br/><br/>
                        <div class="col-lg-4">
                            <div class="login-form" class="form-group">
                                <p>Время аренды</p>
                                <input class="form-control" type="text" name="time" placeholder="Первый" value=""> 
                                <span style='padding-left:10px;'> </span>
                                <input class="form-control" type="text" name="time1" placeholder="Второй" value=""> 
                                <span style='padding-left:10px;'> </span>
                                <input class="form-control" type="text" name="time2" placeholder="Третий" value=""> 
                                <span style='padding-left:10px;'> </span>
                                <input class="form-control" type="text" name="time3" placeholder="Четвёртый" value=""> 
                                <span style='padding-left:10px;'> </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="login-form" class="form-groupo">
                                <p>Цена</p>
                                <input class="form-control" type="text" name="price" placeholder="Первый" value="">
                                <span style='padding-left:10px;'> </span>
                                <input class="form-control" type="text" name="price1" placeholder="Второй" value="">
                                <span style='padding-left:10px;'> </span>
                                <input class="form-control" type="text" name="price2" placeholder="Третий" value="">
                                <span style='padding-left:10px;'> </span>
                                <input class="form-control" type="text" name="price3" placeholder="Четвёртый" value="">
                                <span style='padding-left:10px;'> </span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить" style="margin-left: 10%">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

