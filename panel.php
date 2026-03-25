<?php
require_once 'init.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheMath.NET: Учебный портал по математике и соц.сеть</title>
    <link rel="stylesheet" href="styless.css">
  </head>
  <body>
     <header>
        <div class="logo">
            <img src="ph.jpg"> 
            <h1>TheMath.Net</h1>
            <button class="butttt" command="show-modal" commandfor="plan">Посмотреть план сайта</button>
            <dialog id="plan" class="text">
                <p style='color: black;'>План сайта:</p>
                <a href="index.html">Главная страница</a><br>
                <a href="doc.html">Документация, рассказ об этом сайте</a><br>
                <a href="calc.html">Калькуляторы</a><br>
                <a href="forum.php">Форум</a><br>
                <a href="in.php">Регистрация</a><br>
                <a href="fo.php">Авторизация</a><br>
                <a href="new.php">Новости</a><br>
                <a href="cartooo.php">задачи</a><br>
                <a href="zam.html">Заметки</a>
                <a href="class.php">ДЗ</a>
                <a href="gost.php">Форум без регистрации</a><br>
                <a href="bot.html">Бот для обучения</a><br>
                <a href="Test.html">Тесты и игры</a><br>
                <a href="informatika.php">Информатика</a>
                <button commandfor="plan" command="close">Закрыть</button>
            </dialog>
        </div>
    </header>
  	<div class="text">
        <h2>Панель для новостей</h2>
        <form action="new.php" method="post" class="container">
            <label>Введите пароль</label><br><br>
            <input type="password" name="passwor"><br><br>
            <label>Введите Заголовок</label><br><br>
            <input type="text" name="title"><br><br>
            <label>Введите текст</label><br><br>
            <textarea name="t"></textarea><br><br>
            <label>Введите ссылку на фото (если есть)</label><br><br>
            <input type="text" name="im"><br><br>
            <button>Загрузить</button>
        </form>
        <h2>Панель для ДЗ</h2>
        <form action="class.php" method="post" class="container">
            <label>Введите пароль</label><br><br>
            <input type="password" name="pass"><br><br>
            <label>Введите имя</label><br>
            <input type="text" name="name"><br>
            <label>Введите какому классу задание</label><br><br>
            <input type="text" name="title"><br><br>
            <label>Введите текст</label><br><br>
            <textarea name="t"></textarea><br><br>
            <label>Введите ссылку на фото (если есть)</label><br><br>
            <input type="text" name="im"><br><br>
            <button>Загрузить</button>
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer>
    	<p>CapybaraGame`s</p>
    </footer>
  </body>
</html>