<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="prod_wrap">
<section class="cart">
    <h3 style="text-align: center;">Заказ оформлен! Мы вам перезвоним!</h3>
</section>

<div class="back"><a href="/catalog">Вернуться к покупкам</a></div>
</div>

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

<?php include ROOT . '/views/layouts/footer.php'; ?>