<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница сайта" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" type="text/css" charset="utf-8">

</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>
    <?php if($_COOKIE['login']==''): ?>
    <div class="container main">
        <h1>Сокра.тим</h1>

        <div class="products">
            Вам нужно сократить ссылку? Прежде чем это сделать зарегистрируйтесь на сайте
        </div>
        <form action="home/index" method="post" class="form-controll">

            <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
            <input type="text" name="name" placeholder="Введите логин" value="<?=$_POST['name']?>"><br>
            <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Зарегистрироваться</button>
        </form>
        <div>Есть аккаунт? Тогда вы можете <a href="/user/auth">авторизоваться</a></div>
    </div>

    <?php else: ?>
    <div class="container main">
        <h1>Сокра.тим</h1>

        <div class="products">
            Вам нужно сократить ссылку? Сейчас мы это сделаем!
        </div>

        <form action="/" method="post" class="form-controll">

            <input type="text" name="long" placeholder="Длинное название" value="<?=$_POST['long']?>"><br>
            <input type="text" name="short" placeholder="Короткое название" value="<?=$_POST['short']?>"><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Уменьшить</button>
        </form>
        <div><?=$data['urls']?></div>
    </div>
    <?php endif;?>
    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>