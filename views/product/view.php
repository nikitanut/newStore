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
                                        <a class="cs-fancybox-thumbs cloud-zoom" rel="adjustX:30,adjustY:0,position:'right',tint:'#202020',tintOpacity:0.5,smoothMove:2,showTitle:true,titleOpacity:0.5" data-fancybox-group="thumb" href="#" title="Women Shorts" alt="Women Shorts">
                                            <img src="<?php echo Product::getImage($product['id']); ?>" alt="Батут" title="Батут"/>
                                        </a>
                                    </div>					
                                </div>
                            </div>
                        </div>
                        <!-- end product_slider -->
                    </div>
                    <!-- start span1_of_1 -->
                    <div class="span1_of_1_des">
                        <div class="desc1">
                            <h3><?php echo $product['name']; ?></h3>


                            <h5>Стоимость:</h5>

                            <?php foreach ($prices as $price): ?>
                                <h4  value="<?php echo $price['time']; ?>"><?php echo $price['time'] . " - " . $price['price'] . "р."; ?></h4>
                            <?php endforeach; ?>                                
                            <a href="#" data-id="<?php echo $product['id']; ?>" class="toCart add-to-cart">В корзину</a>                                	
                            <div class="clear"></div>

                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- start tabs -->
                    <section class="tabs">
                        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
                        <label for="tab-1" class="tab-label-1">overview</label>
                        <div class="clear-shadow"></div>
                        <div class="content">
                            <div class="content-1">
                                <p class="para top"><?php echo $product['description'] . '<br>'; ?></p>
                                <ul>
                                    <?php
                                    $characteristics = explode('.', $product['characteristics']); // Характеристики из строки в массив
                                    if (end($characteristics) == '') // Если в конце характеристики нет '.'
                                        array_pop($characteristics);
                                    foreach ($characteristics as $char):
                                         echo '<li>' . $char . '</li>'; 
                                    endforeach; ?>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </section>
                    <!-- end tabs -->
                </div>
                <div class="clear"></div>
            </div>	
            <!-- end content -->
        </div>
    </div>
</div>		
<?php
include ROOT . '/views/layouts/footer.php';

