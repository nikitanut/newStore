<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- start main1 -->
<div class="main_bg1">
    <div class="wrap">	
        <div class="main1">
            <h2><?php foreach ($categories as $categoryItem): ?>
                    <a href="/category/<?php echo $categoryItem['id']; ?>"
                       class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>">
                           <?php echo $categoryItem['name']; ?>            
                    </a> |
                <?php endforeach; ?> </h2>
        </div>
    </div>
</div>
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
            <?php for ($i = 0; $i < count($categoryProducts); $i++):  // Перебор массива с товарами для вывода
                if ($i % 3 == 0): // Если новая строка, то вставить grids_of_3 (позиции для 3х товаров)
                    ?> 
                    <div class="grids_of_3"> 
    <?php endif; ?>
                    <div class="grid1_of_3">   
                        <img src="<?php echo Product::getImage($categoryProducts[$i]['id']); ?>" alt=""/>                     

                        <div class="price"><h3><?php echo $categoryProducts[$i]['name']; ?></h3></div>
                        <table width="100%" cellspacing="0" cellpadding="5">
                            <tr> 
                                <td width="200" valign="top">
                                    <div class="price"><h4>200р. - 1 день<br>1000р. - 1 неделя<br>2000р. - 3 недели<br></h4></div></td>
                                <td valign="top">
                                    <a href="/product/<?php echo $categoryProducts[$i]['id']; ?>"><div class="price"><h4><span>Подробнее</span></h4></div></a>
                                  <!--  <a href="#" id="add-to-cart" data-id="<?php //echo $categoryProducts[$i]['id'];  ?>"><div class="price"><h4><span>В корзину</span></h4> -->
                                    <a href="#" data-id="<?php echo $categoryProducts[$i]['id']; ?>" class="btn btn-default add-to-cart"><h4><span>В корзину</span></h4>

                                </td>
                                </a>
                            </tr>
                        </table>
                        <span class="b_btm"></span>                       

                    </div>  
                    <?php if ((($i + 1) % 3 == 0 && $i != 0)            // Если товар - последний в grids_of_3
                            || ($i + 1 == count($categoryProducts))): // или последний в массиве, то сделать отступ
                        ?>
                        <div class="clear"></div>                   
                <?php endif; ?>
                <?php if (($i + 1) % 3 == 0): // Если товар последний в grids_of_3, то закрыть тег?> 
                    </div>
    <?php endif; ?>
<?php endfor; ?>
            <!-- end grids_of_3 -->
            <script>
                $("#addProd").click(function () {
                    var params = {
                        text: $()
                    }
                })
            </script>
        </div>
    </div>
</div>
<?php
include ROOT . '/views/layouts/footer.php';