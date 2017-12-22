<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/price">Управление ценами</a></li>
                    <li class="active">Редактировать цену</li>
                </ol>
            </div>


            <h4>Редактировать цену "<?php echo $product['name']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                              

                                                
                        <p>Время аренды</p>
                        <input type="text" name="time" placeholder="" value="<?php echo $prices['time']; ?>">
                               
                        <p>Стоимость</p>
                        <input type="text" name="price" placeholder="" value="<?php echo $prices['price']; ?>">
                         
                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


