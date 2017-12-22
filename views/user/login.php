<link rel="stylesheet" href="/template/admin/font-awesome-4.7.0/css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="/template/admin/css/login.css" type="text/css"> 
<div class="container">
    <img src="/template/admin/images/lock.png">
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="#" method="post">
        <div class="dws-input">
            <input type="login" name="login" placeholder="Введите логин">
        </div>
        <div class="dws-input">
            <input type="password" name="password" placeholder="Введите пароль">
        </div>
            <input class="dws-submit" type="submit" name="submit" value="ВОЙТИ"><br />
    </form>
</div>