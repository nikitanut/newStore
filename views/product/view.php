<?php include ROOT . '/views/layouts/header.php'; ?>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">	
        <div class="main">
            <!-- start content -->
            <div class="single">
                <!-- start span1_of_1 -->
                <div class="left_content">
                    <div class="span1_of_1">
                        <!-- start product_slider -->

                        <h3><?php echo $product['name']; ?></h3>
                        <img src="<?php echo Product::getImage($product['id']); ?>" class="image" alt="Батут" title="Батут"/>

                        <!-- end product_slider -->
                    </div>
                    <!-- start span1_of_1 -->
                    <div class="span1_of_1_des">
                        <fieldset>
                            <legend>Характеристики</legend>
                            <ul>
                                <?php
                                $characteristics = explode('.', $product['characteristics']); // Характеристики из строки в массив
                                if (end($characteristics) == '') // Если в конце характеристики нет '.'
                                    array_pop($characteristics);
                                foreach ($characteristics as $char):
                                    echo '<li>' . $char . '</li>';
                                endforeach;
                                ?>
                            </ul>
                        </fieldset>
                        <div class="desc1">     

                            <fieldset>
                                <legend>Стоимость</legend>

                                <?php foreach ($prices as $price): ?>
                                    <h4  value="<?php echo $price['time']; ?>"><?php echo $price['time'] . " - " . $price['price'] . "р."; ?></h4>
                                <?php endforeach; ?>                               

                            </fieldset>
                            <a href="#" data-id="<?php echo $product['id']; ?>" class="toCart add-to-cart">Добавить в корзину</a> 
                            <a href="/cart" class="more">Перейти в корзину</a>
                            <div class="clear"></div>
                        </div>
                    </div>                   
                    <!-- <h3>Полное описание</h3> -->
                    <fieldset>
                        <legend>Описание</legend>
                    <p class="para top"><?php echo substr(nl2br(nl2br(htmlspecialchars(trim($product['description'])))), 0); ?></p>
                    </fieldset>
                </div>
                <div class="clear"></div>
            </div>	
            <!-- end content -->
        </div>
    </div>
</div>		

<script>
    $(document).ready(function () { // Ждём загрузки страницы

        $(".image").click(function () {	// Событие клика на маленькое изображение
            var img = $(this);	// Получаем изображение, на которое кликнули
            var src = img.attr('src'); // Достаем из этого изображения путь до картинки
            $("body").append("<div class='popup'>" + //Добавляем в тело документа разметку всплывающего окна
                    "<div class='popup_bg'></div>" + // Блок, который будет служить фоном затемненным
                    "<img src='" + src + "' class='popup_img' />" + // Само увеличенное фото
                    "</div>");
            $(".popup").fadeIn(800); // Медленно выводим изображение
            $(".popup_bg").click(function () {	// Событие клика на затемненный фон	   
                $(".popup").fadeOut(800);	// Медленно убираем всплывающее окно
                setTimeout(function () {	// Выставляем таймер
                    $(".popup").remove(); // Удаляем разметку всплывающего окна
                }, 800);
            });
        });

    });
</script>

<?php
include ROOT . '/views/layouts/footer.php';
