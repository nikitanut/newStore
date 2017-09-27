<?php include ROOT . '/views/layouts/header.php'; ?>

 <?php foreach ($productsInCart as &$prod):
        $prod = '1 неделя';
 endforeach; ?>
<section class="cart">
    <h3 style="text-align: center;">Заказ оформлен! Мы вам перезвоним!</h3>
</section>

<div class="back"><a href="/catalog">Вернуться к покупкам</a></div>

<?php include ROOT . '/views/layouts/footer.php'; ?>