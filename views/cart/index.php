<?php include ROOT . '/views/layouts/header.php'; ?>
<script type="text/javascript" src="/template/js/moment-with-locales.min.js"></script>
<link rel="stylesheet" href="/template/css/bootstrap-datetimepicker.min.css"/>

    <?php if ($productsInCart): ?>
<div class="prod_wrap">
    <form action="/cart/checkout" method="post" onsubmit="return checkForm(this)">  
        <div class="cart_wrap">
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
                                    <img src="<?php echo Product::getImage($product['id']); ?>" alt=""/>
                                </td>
                                <td>
                                    <h3><a href="/product/<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a></h3>
                                </td>
                                <td>
                                    <h3>
                                        <select class="list" name="time<?php echo $product['id'] ?>" id="rentTime<?php echo $product['id']; ?>">
                                            <option selected disabled="Выберите срок аренды">Срок аренды</option>
                                            <?php
                                            foreach ($prices as $price):
                                                if ($product['id'] == $price['prod_id']):
                                                    ?>
                                                    <option  value="<?php echo $price['time']; ?>"><?php echo $price['time'] . " - " . $price['price'] . "р."; ?></option>
                                                    <?php
                                                endif;
                                            endforeach;
                                            ?>
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

                    </tbody>
                </table>
                <h2 class="temp">Общая стоимость: 0р.</h2>
            </section>
            <br><br>        

            <script src="/template/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>  
            <h3 align="center">Выберите желаемую дату доставки</h3>
            <center><input type="text" id="datetimepicker" name="datetimepicker"></center>
            <h3 align="center">Контактные данные</h3>
            <br>

            <div class="new-contact-form">
                <input name="name" id="applicationName" maxlength="50" placeholder="ФИО" spellcheck="false" required />
                <input name="telephone" type="tel" id="applicationTelephone" placeholder="Ваш телефон" spellcheck="false" required />            
                <input name="email" type="email" id="applicationEmail" maxlength="30" placeholder="Ваш e-mail" spellcheck="false"/>
                <input name="address"  id="applicationAddress" maxlength="100" placeholder="Адрес доставки" spellcheck="false" required/>
                <textarea name="comment" id="userComment" rows="10" placeholder="Комментарий"></textarea>
                <button type="submit" class="applicationButton" name="submit"> Забронировать </button>
            </div>
        </div>
        </div>
    <?php else: ?>
        <h3 align="center">Корзина пуста</h3>
        <div class="back"><a href="/catalog">Вернуться к покупкам</a></div>
        <?php if (count($sliderProducts) != 0): ?>
<div class="main_bg1">
    <div class="wrap">	
        <div class="main1">
            <h2>Рекомендуемые товары</h2>        
        </div>
    </div>
</div>
    <div class="main_bg">
        <div class="prod_wrap">	
            <div class="main">
                <!-- start grids_of_3 -->
                <?php  $recommendedProducts= array_rand($sliderProducts, 8);
                for ($i = 0; $i < count($recommendedProducts); $i++):  // Перебор массива с товарами для вывода
                    
                    if ($i % 4 == 0): // Если новая строка, то вставить grids_of_3 (позиции для 3х товаров)
                        ?> 
                        <div class="grids_of_3"> 
                        <?php endif; ?>
                        <div class="grid1_of_3">
                            <a href="/product/<?php echo $sliderProducts[$recommendedProducts[$i]]['id']; ?>">
                                <h3><?php echo $sliderProducts[$recommendedProducts[$i]]['name']; ?></h3>
                                <img src="<?php echo Product::getImage($sliderProducts[$recommendedProducts[$i]]['id']); ?>" alt="" />                        
                            </a>                                        
                            <span class="b_btm"></span>
                        </div>
                        <?php
                        if ((($i + 1) % 4 == 0 && $i != 0)            // Если товар - последний в grids_of_3
                                || ($i + 1 == count($recommendedProducts))): // или последний в массиве, то сделать отступ
                            ?>
                            <div class="clear"></div>                   
                        <?php endif; ?>
                        <?php if (($i + 1) % 4 == 0): // Если товар последний в grids_of_3, то закрыть тег  ?> 
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>	
<?php endif; ?>
    <?php endif; ?>
    <script type="text/javascript" src="/template/js/maskedinput.js"></script>

    <script>
        jQuery(function ($) {
            $("#applicationTelephone").mask("8 (999) 999-99-99");
        });
        $("form").submit(function () { //Перед submit
            var a = true;
            $('.alertMes').remove();
            $('.list').each(function (i) { // Проверка каждого выпадающего списка
                if ($(this).val() === null) { // Если хотя бы один из списков null
                    $(this).after('<h1 class="alertMes" style="color:red; text-align: center; font-size: 0.5em"><br>Заполните поле</h1>');  // Вывести ошибку
                    a = false; // Отменить submit
                }
            });
            if ($("#datetimepicker").val() === "") { // Если не ввели дату
                $("#datetimepicker").before('<br><h1 class="alertMes" style="color:red; line-height:0; margin-bottom: 1em; font-size: 1.3em";><br>Заполните поле</h1>');  // Вывести ошибку
                a = false; // Отменить submit
            }
            if (!a) {
                window.scrollTo(0, 0);
                return false;
            }
        });
        var priceArr = [];
        $("select").change(function (e) { // При изменении срока аренды через выпадающий список         
            var price = $("option:selected", this).text();
            price = price.split('-')[1]; // Получить строку с ценой ( 100 р.) 
            price = parseInt(price.replace(/\D+/ig, '')); // Получить цену (100)

            var ind = e.target.id; // Имя элемента (rentTime#)
            ind = parseInt(ind.replace(/\D+/ig, '')); // получить только число из rentTime# (id товара)

            priceArr[ind] = price;

            var sum = 0;
            priceArr.forEach(function (a) {
                sum += a; // Посчитать общую сумму
            });

            $(".temp").html("Общая стоимость: " + sum + "р.");
            ;
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                language: 'ru',
                format: "DD-MM-YYYY",
                pickTime: false,
                minDate: new Date()
            });
        });
    </script> 

</form>

<?php include ROOT . '/views/layouts/footer.php'; ?>