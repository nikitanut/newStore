<?php include ROOT . '/views/layouts/header.php'; ?>
<?php if ($productsInCart): ?>
    <form action="/cart/checkout" method="post" onsubmit="return checkForm(this)">  

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
                                        <option selected disabled="Выберите срок аренды">Выберите срок аренды</option>
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
        <h3 align="center">Выберите желаемую дату доставки</h3>
        <center><input name="rent_date" type="date" id="rent_date" /></center>
        <h3 align="center">Контактные данные</h3>
        <br>
        <div class="new-contact-form">       

            <input name="name" id="applicationName" maxlength="50" placeholder="Ваше имя" spellcheck="false" required />
            <input name="telephone" type="tel" id="applicationTelephone" maxlength="20" placeholder="Ваш телефон" spellcheck="false" required />            
            <input name="email" type="email" id="applicationEmail" maxlength="20" placeholder="Ваш e-mail" spellcheck="false"/>
            <input name="vk_link"  id="applicationVK" maxlength="20" placeholder="Ссылка на vk" spellcheck="false"/>
            <textarea name="comment" id="userComment" rows="10" placeholder="Комментарий"></textarea>
            <button type="submit" class="applicationButton" name="submit"> Забронировать </button>

        </div>

    <?php else: ?>
        <h3 align="center">Корзина пуста</h3>
        <div class="back"><a href="/catalog">Вернуться к покупкам</a></div>
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
                $(this).after('<h1 class="alertMes" style="color:red; line-height:0"><br>Заполните поле</h1>');  // Вывести ошибку
                a = false; // Отменить submit
            }
        });
        if ($("#rent_date").val() === ""){ // Если не ввели дату
            $("#rent_date").before('<br><h1 class="alertMes" style="color:red; line-height:0"><br>Заполните поле</h1>');  // Вывести ошибку
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
        priceArr.forEach(function(a) {
           sum+=a; // Посчитать общую сумму
        });
        
        $(".temp").html("Общая стоимость: " + sum + "р.");
        ;
    });
    </script>



<!--  /* <script>
var priceArr = [];
$("select").change(function (e) { // При изменении срока аренды через выпадающий список
    var ind = e.target.id; // Имя элемента (rentTime#)
    ind = parseInt(ind.replace(/\D+/ig, '')); // получить только число из rentTime# (id товара)
    var val = $(this).val(); // Срок аренды    
  //  if (typeof priceArr[ind] === "undefined") 
    priceArr[ind] = val;                        
});
</script> 
<script>
$(".applicationButton").click(function() {       
jQuery.post("/cart/checkout", {
   'priceArr': priceArr,
},
function (data) {
   alert(data);
});
});
</script> -->
</form>
<?php include ROOT . '/views/layouts/footer.php'; ?>