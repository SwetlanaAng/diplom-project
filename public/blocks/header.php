<header>
    <div class="container top-menu">
        <div>
            <img src="/public/img/kitty.png" width="70px" alt="cat"><div class="nearCat">Уберём всё лишнее из ссылки!</div></div>
        <div class="nav">
            <a href="/">Главная</a>
            <a href="/contact/about">Про нас</a>
            <a href="/contact">Контакты</a>
            <?php if($_COOKIE['login'] == ''):?>
            <a href="/user/auth">Войти</a>
            <?php else: ?>
                <a href="/user/dashboard">Личный кабинет</a>
            <?php endif;?>
        </div>
    </div>

</header>