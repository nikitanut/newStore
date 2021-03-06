<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- start main -->
<div class="main_bg">
    <div class="category-name"> 
        <?php echo $categoryname['name']; ?> 
    </div>     
    <div class="prod_wrap">	
        <div class="main">
            <!-- start grids_of_3 -->
            <?php if (count($categoryProducts) == 0): ?>
                <div class="grids_of_3"></div>
                <div class="prod_wrap">
                    <h3 style="text-align: center;">В данной категории товаров пока нет</h3>
                </div>
                <div class="clear"></div>
            <?php endif; ?>
            <?php
            for ($i = 0; $i < count($categoryProducts); $i++):  // Перебор массива с товарами для вывода
                if ($i % 4 == 0): // Если новая строка, то вставить grids_of_3 (позиции для 3х товаров)
                    ?> 
                    <div class="grids_of_3"> 
                    <?php endif; ?>
                    <div class="grid1_of_3">   
                        <h3><?php echo $categoryProducts[$i]['name']; ?></h3>
                        <img src="<?php echo Product::getImage($categoryProducts[$i]['id']); ?>" alt=""/>  

                        <table width="100%" cellspacing="0" cellpadding="5">
                            <tr> 

                            <div class="price">
                                <h4><?php
                                    foreach ($prices as $price):
                                        if ($categoryProducts[$i]['id'] == $price['prod_id']):
                                            echo $price['time'] . " - " . $price['price'] . "р.";
                                            ?><br><?php
                                        endif;
                                    endforeach;
                                    ?>
                                </h4>
                                <a href="/product/<?php echo $categoryProducts[$i]['id']; ?>" class="more">Подробнее</a>                                  

                                <?php
                                if (!is_array($productsInCart))
                                    $productsInCart = array(); // Костыль
                                if (!array_key_exists($categoryProducts[$i]['id'], $productsInCart)):
                                    ?>
                                    <a href="" data-id="<?php echo $categoryProducts[$i]['id']; ?>" class="toCart add-to-cart">В корзину</a>
                                <?php else: ?>
                                    <a href="/cart" class="toCart added-to-cart" style="color: rgb(32, 73, 134);">Заказать</a>
                                <?php endif; ?>
                            </div>

                            </tr>
                        </table>
                        <span class="b_btm"></span> 
                        <?php if ($categoryProducts[$i]['is_new']): ?> 
                            <img src="/upload/new.png" alt="" style="position: absolute;top: 0;right: 0;height: 8%;"/> 
                        <?php endif; ?>

                    </div>  
                    <?php
                    if ((($i + 1) % 4 == 0 && $i != 0)            // Если товар - последний в grids_of_3
                            || ($i + 1 == count($categoryProducts))): // или последний в массиве, то сделать отступ
                        ?>
                        <div class="clear"></div>                   
                    <?php endif; ?>
                    <?php if (($i + 1) % 4 == 0): // Если товар последний в grids_of_3, то закрыть тег    ?> 
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            <!-- end grids_of_3 -->

        </div>
        <?php echo $pagination->get(); ?>
    </div>
</div>
<?php
include ROOT . '/views/layouts/footer.php';
