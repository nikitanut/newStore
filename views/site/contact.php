<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="prod_wrap">
    <form class="contact_form" action="" method="post" name="contact_form">
        <?php if ($result): ?>
            <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <ul>
                <li>
                    <h2>Связаться с нами</h2>                    
                </li>
                <li>
                    <label for="name">Имя:</label>
                    <input type="text" name="name" placeholder="Иван Иванов" required=""/>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="userEmail" placeholder="ivanov@gmail.com" required="" value="<?php echo $userEmail; ?>"/>
                </li>
                <li>
                    <label for="message">Сообщение:</label>
                    <textarea name="userText" cols="40" rows="6" required="" value="<?php echo $userText; ?>"></textarea>
                </li>
                <li>
                    <button class="submit" type="submit" name="submit" value="Отправить">Отправить</button>
                </li>

            </ul>
<?php endif; ?>
        </form>
    </div>



<?php include ROOT . '/views/layouts/footer.php'; ?>