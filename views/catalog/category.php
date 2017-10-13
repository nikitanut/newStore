<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- start main -->
<div class="main_bg">
    <div class="wrap">	
        <div class="main">
            <!-- start grids_of_3 -->
            <?php if (count($categoryProducts) == 0): ?>
                <div class="grids_of_3"></div>
                <!-- TODO. Если нет товаров, то чё-нибудь вывести -->
                <div class="clear"></div>
            <?php endif; ?>
            <?php
            for ($i = 0; $i < count($categoryProducts); $i++):  // Перебор массива с товарами для вывода
                if ($i % 3 == 0): // Если новая строка, то вставить grids_of_3 (позиции для 3х товаров)
                    ?> 
                    <div class="grids_of_3"> 
                    <?php endif; ?>
                    <div class="grid1_of_3">   
                        <div class="price"><h3><?php echo $categoryProducts[$i]['name']; ?></h3></div> 
                        <img src="<?php echo Product::getImage($categoryProducts[$i]['id']); ?>" alt=""/>  
                       
                        <table width="100%" cellspacing="0" cellpadding="5">
                            <tr> 
                                <td width="200" valign="top">
                                    <div class="price">
                                        <h4><?php foreach ($prices as $price):
                                            if ($categoryProducts[$i]['id'] == $price['prod_id']):
                                                echo $price['time'] . " - " . $price['price'] . "р.";?><br><?php endif;endforeach;?>
                                        </h4>
                                    </div>
                                </td>
                                <td valign="top">
                                    <a href="/product/<?php echo $categoryProducts[$i]['id']; ?>"><div class="more">Подробнее</div></a>                                  
                                    
                                    <?php if (!is_array($productsInCart)) $productsInCart = array(); // Костыль
                                    if (!array_key_exists($categoryProducts[$i]['id'], $productsInCart)):?>
                                        <a href="" data-id="<?php echo $categoryProducts[$i]['id']; ?>" class="toCart add-to-cart">В корзину</a>
                                        <?php else:?>
                                        <a class="toCart added-to-cart" style="color: rgb(32, 73, 134);">Добавлено</a>
                                        <?php    endif;?>
                                </td>
                                
                            </tr>
                        </table>
                        <span class="b_btm"></span>                       

                    </div>  
                    <?php
                    if ((($i + 1) % 3 == 0 && $i != 0)            // Если товар - последний в grids_of_3
                            || ($i + 1 == count($categoryProducts))): // или последний в массиве, то сделать отступ
                        ?>
                        <div class="clear"></div>                   
                    <?php endif; ?>
                    <?php if (($i + 1) % 3 == 0): // Если товар последний в grids_of_3, то закрыть тег  ?> 
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            <!-- end grids_of_3 -->


        </div>
    </div>
</div>
<?php
include ROOT . '/views/layouts/footer.php';
