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
                        <div class="product-view">
                            <div class="product-essential">
                                <div class="product-img-box">
                                    <div class="more-views" style="float:left;">
                                        <div class="more-views-container">
                                            <ul>
                                                <li>
                                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
                                                        <img src="" src_main=""  title="" alt="" /></a>            
                                                </li>
                                                <li>
                                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
                                                        <img src="" src_main=""  title="" alt="" /></a>
                                                </li>
                                                <li>
                                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
                                                        <img src="" src_main=""  title="" alt="" /></a> 
                                                </li>
                                                <li>
                                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
                                                        <img src="" src_main="" title="" alt="" /></a>  
                                                </li>
                                                <li>
                                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
                                                        <img src="" src_main="" title="" alt="" /></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-image"> 
                                        <h3><?php echo $product['name']; ?></h3>
                                        <img src="<?php echo Product::getImage($product['id']); ?>" alt="Батут" title="Батут"/>
                                    </div>					
                                </div>  
                            </div>
                        </div>
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
                                <legend>Стоимость:</legend>

                                <?php foreach ($prices as $price): ?>
                                    <h4  value="<?php echo $price['time']; ?>"><?php echo $price['time'] . " - " . $price['price'] . "р."; ?></h4>
                                <?php endforeach; ?>                               

                            </fieldset>
                            <a href="#" data-id="<?php echo $product['id']; ?>" class="toCart add-to-cart">Добавить в корзину</a>                                	
                            <div class="clear"></div>
                        </div>
                    </div>                   
                    
                    <div class="clear"></div>                                    
                </div>
                
                <fieldset>
                            <legend>Полное описание</legend>
                        <div class="content-1">
                            <p class="para top"><?php echo substr(nl2br(nl2br(htmlspecialchars(trim($product['description'])))), 0); ?></p>                                
                            <div class="clear"></div>
                        </div>
                        </fieldset>
                
                <div class="clear"></div>
            </div>	
            <!-- end content -->
        </div>
    </div>
</div>		
<?php
include ROOT . '/views/layouts/footer.php';