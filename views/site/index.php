<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- start slider -->		
<link href="/template/css/slider.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="/template/js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="/template/js/jquery.cslider.js"></script>
<script type="text/javascript">
    $(function () {
        $('#da-slider').cslider();        
    });
</script>
<!-- Owl Carousel Assets -->
<link href="/template/css/owl.carousel.css" rel="stylesheet">
<!-- Owl Carousel Assets -->
<!-- Prettify -->
<script src="/template/js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            items: 4,
            lazyLoad: true,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            rewindNav: false,
            scrollPerPage: false,
            pagination: false,
            paginationNumbers: false,
        });

    });
</script>
<!-- //Owl Carousel Assets -->
<!-- start top_js_button -->
<script type="text/javascript" src="/template/js/move-top.js"></script>
<script type="text/javascript" src="/template/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    });
</script>



<!-- start slider -->
<div id="da-slider" class="da-slider">
    <div class="da-slide">
        <h2>Праздники с нами</h2>
        <p> Организуем игровое пространство <br>на день рождения карапуза!</p>
        <a href="/catalog" class="da-link">Поехали</a>
        <div class="da-img"><img src="/upload/gh.png" alt="image01" /></div>
    </div>
    <div class="da-slide">
        <h2>Дети так быстро растут</h2>
        <p> Некоторые товары первого года жизни стоят очень дорого, а требуются всего на пару месяцев. Возьмите на прокат и пользуйтесь с удовольствием!</p>
        <a href="/catalog" class="da-link">Поехали</a>
        <div class="da-img"><img src="/upload/i.png" alt="image01" /></div>
    </div>
    <div class="da-slide">
        <h2>Лучшие бренды</h2>
        <p> В нашем прокате только мировые хиты, которые обязательно понравятся Вашему малышу!</p>
        <a href="/catalog" class="da-link">Поехали</a>
        <div class="da-img"><img src="/upload/df.png" alt="image01" /></div>
    </div>
    <div class="da-slide">
        <h2>Экономия места</h2>
        <p> Негде хранить объемные игрушки? Возьмите напрокат и освободите наконец балкон!</p>
        <a href="/catalog" class="da-link">Поехали</a>
        <div class="da-img"><img src="/upload/h.png" alt="image01" style="width: 60%;"/></div>
    </div>
    <nav class="da-arrows">
        <span class="da-arrows-prev"></span>
        <span class="da-arrows-next"></span>
    </nav>
</div>
<!----start-cursual---->
<div class="wrap">
    <!----start-img-cursual---->
    <div id="owl-demo" class="owl-carousel">
        <?php foreach ($categories as $category): ?>
        <div class="item" onclick="location.href = '/category/<?php echo $category['id'] ?>';">
            <div class="cau_left">
                <img class="lazyOwl" data-src="/upload/images/products/categories/<?php echo $category['id'] ?>.jpg" alt="Lazy Owl Image">
            </div>
            <div class="cau_left">
                <h5><a href="/category/<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></h5>
                
            </div>
        </div>
        <?php  endforeach; ?>
    </div>
    <!----//End-img-cursual---->
</div>
<!-- start main1 -->
<div class="main_bg1">
    <div class="wrap">	
        <div class="main1">
            <h2>Рекомендуемые продукты</h2>        
        </div>
    </div>
</div>
<div class="main_bg">
    <div class="prod_wrap">	
        <div class="main">
            <!-- start grids_of_3 -->
            <?php if (count($sliderProducts) == 0): ?>
                <div class="grids_of_3"></div>
                <!-- TODO. Если нет товаров, то чё-нибудь вывести -->
                <div class="clear"></div>
            <?php else: ?>
            <?php
            for ($i = 0; $i < 4; $i++):  // Перебор массива с товарами для вывода
                if ($i % 4 == 0): // Если новая строка, то вставить grids_of_3 (позиции для 3х товаров)
                    ?> 
                    <div class="grids_of_3"> 
                    <?php endif; ?>
                    <div class="grid1_of_3">
                        <h3><?php echo $sliderProducts[$i]['name']; ?></h3>
                        <img src="<?php echo Product::getImage($sliderProducts[$i]['id']); ?>" alt="" />
                        <a href="/product/<?php echo $sliderProducts[$i]['id']; ?>">
                            
                            <div class="price"><h3><span>Подробнее</span></h3></div>
                        </a>
                        <!--<div class="price"> <h4>$<?php //echo $sliderItem['price'];    ?></h4> </div>  -->                                          
                        <span class="b_btm"></span>
                    </div>
                    <?php
                    if ((($i + 1) % 4 == 0 && $i != 0)            // Если товар - последний в grids_of_3
                            || ($i + 1 == count($sliderProducts))): // или последний в массиве, то сделать отступ
                        ?>
                        <div class="clear"></div>                   
                    <?php endif; ?>
                    <?php if (($i + 1) % 4 == 0): // Если товар последний в grids_of_3, то закрыть тег  ?> 
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
<?php endif; ?>
        </div>
    </div>
</div>	
<?php
include ROOT . '/views/layouts/footer.php';
