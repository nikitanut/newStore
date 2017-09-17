<!DOCTYPE HTML>
<html>
<head>
<title>Центр проката г. Нарьян-Мар</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"/>
<link href="/template/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="/template/js/jquery.min.js"></script>	
<link href="/template/css/slider.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <!-- start header -->
<div class="header_bg">    
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="/template/images/logo.png" alt=""/> </a>
		</div>
		<div class="h_icon">
		<ul class="icon1 sub-icon1">
			<li><a class="active-icon c1" href="#"><i>$300</i></a>
				<ul class="sub-icon1 list">
                                    <li><h3 id="cart-count">(<?php echo Cart::countItems(); ?>)</h3><a href=""></a></li>
					<li><p>if items in your wishlit are missing, <a href="new/contact.html">contact us</a> to view them</p></li>
				</ul>
			</li>
		</ul>
		</div>
		<div class="h_search">
    		<form>
    			<input type="text" value="">
    			<input type="submit" value="">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<div class="header_btm">
<div class="wrap">
	<div class="header_sub">
		<div class="h_menu">
			<ul>
				<li><a href="/">Главная</a></li> |
                                <li><a href="/catalog" class="<?php if ($_SERVER['REQUEST_URI'] == '/catalog') echo 'active';?>">Каталог</a></li> |
                                <li><a href="#">Контакты</a></li>
				<!--
                                <li><a href="#">Игровые комплексы, горки, качели</a></li> |
                                <li><a href="#">Батуты</a></li> |
                                <li><a href="#">Каталки, прыгуны, поницыкл</a></li> |
                                <li><a href="#">Ходунки</a></li> |
                                <li><a href="#">Детские центры, шезлонги, качели</a></li> |
                                <li><a href="#">Игры</a></li> |
                                <li><a href="#">Для праздника</a></li> |
                                <li><a href="#">Развивающие игрушки</a></li> |
                                <li><a href="#">Крупные игрушки</a></li> |
                                <li><a href="#">Сопутствующие товары</a></li> |
                                 -->
                                
                           <!-- 
                            <li class="active"><a href="index.php">Home</a></li> |
				<li><a href="new/sale.html">sale</a></li> |
				<li><a href="new/handbags.html">handbags</a></li> |
				<li><a href="new/accessories.html">accessories</a></li> |
				<li><a href="new/wallets.html">wallets</a></li> |
				<li><a href="new/sale.html">sale</a></li> |
				<li><a href="index.php">mens store</a></li> |
				<li><a href="new/shoes.html">shoes</a></li> |
				<li><a href="new/sale.html">vintage</a></li> |
				<li><a href="new/service.html">services</a></li> |
				<li><a href="new/contact.html">Contact us</a></li>
                             -->
			</ul>
		</div>
		<div class="top-nav">
	          <nav class="nav">	        	
	    	    <a href="#" id="w3-menu-trigger"> </a>
	                  
	           </nav>
	             <div class="search_box">
				<form>
				   <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
			    </form>
			</div>
	          <div class="clear"> </div>
	          <script src="/template/js/responsive.menu.js"></script>
                 
         </div>		  
	<div class="clear"></div>
</div>
</div>
</div>