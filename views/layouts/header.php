<!DOCTYPE HTML>
<html>
    <head>
        <title>Центр проката г. Нарьян-Мар</title>
        <meta name="yandex-verification" content="7c6bee438c5986d6" />
        <link href="/template/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="shortcut icon" href="/upload/logo.png" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>        
        <script type="text/javascript" src="/template/js/jquery-2.2.4.min.js"></script>	
        <link href="/template/css/slider.css" rel="stylesheet" type="text/css" media="all" />
        <script src="/template/js/bootstrap.min.js" type="text/javascript"></script>  
    </head>

    <body>
        <!-- Yandex.Metrika counter --> 
        <script type="text/javascript" >
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter47227917 = new Ya.Metrika({
                            id: 47227917,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true,
                            trackHash: true
                        });
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        </script> 
        <noscript><div><img src="https://mc.yandex.ru/watch/47227917" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
        <!-- /Yandex.Metrika counter -->

        <!-- start header -->
        <div class="header_bg">    
            <div class="wrap">
                <div class="header">
                    <div class="logo">
                        <a href="/"><img src="/upload/logo.png" alt=""/></a>
                    </div>
                    <div class="logoname">
                        <a href="/">ЦЕНТР ПРОКАТА</a></div>
                    <div class="number">Работаем с 10:00 до 21:00<br>
                        8 (964) 299-80-91
                    </div>
                    <div class="social-networks">
                        <a href="https://vk.com/prokat83" target="_blank"><img src="/upload/vk.png" alt=""></a>                    
                        <a href="https://www.instagram.com/prokat83/" target="_blank"><img src="/upload/ins.png" alt=""></a>
                    </div>   
                    <div class="h_icon">
                        <ul class="icon1 sub-icon1">
                            <li><a class="active-icon c1" id = "cart_total" href="/cart"><i><?php echo Cart::countItems(); ?></i></a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="header_btm">
            <div class="wrap">
                <div class="header_sub">
                    <div class="h_menu">
                        <ul class="menu">
                            <li><a href="/">Главная</a></li>
                            <li><a href="/catalog">Каталог</a>
                                <ul class="submenu">
                                    <?php foreach ($categories as $categoryItem): ?>
                                        <li><a href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a> 
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li><a href="/condition">Условия проката и доставка</a></li>
                            <li><a href="/contact">Контакты</a></li></ul>


                    </div>
                    <div class="top-nav">
                        <nav class="nav">	        	
                            <a href="#" id="w3-menu-trigger"> </a>
                            <ul class="nav-list">
                                <li class="nav-item"><a href="/">Главная</a></li>
                                <li class="nav-item"><a href="/catalog">Каталог</a></li>
                                <li class="nav-item"><a href="/condition">Условия проката и доставка</a></li>
                                <li class="nav-item"><a href="/contact">Контакты</a></li>
                            </ul>
                        </nav>
                        <div class="clear"> </div>
                        <script src="/template/js/responsive.menu.js"></script>

                    </div>		  
                    <div class="clear"></div>
                </div>
            </div>
        </div>