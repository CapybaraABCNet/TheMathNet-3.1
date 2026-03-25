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
        <h2>Информатика - это интересно</h2>
        <p>Тут будет много информации, но сейчас тут есть 2 функции: Генерация пароля и хэширование пароля</p>
        <div class="container">
            <h2>Генерация пароля:</h2>
            <label for="length" class="m">Длина пароля:</label>
    <input type="number" id="length" min="1" value="10">
    
    <div>
        <input type="checkbox" id="includeUppercase" checked>
        <label for="includeUppercase" class="m">Включить заглавные буквы</label>
    </div>
    
    <div>
        <input type="checkbox" id="includeNumbers" checked>
        <label for="includeNumbers" class="m">Включить цифры</label>
    </div>
    
    <div>
        <input type="checkbox" id="includeSymbols" checked>
        <label for="includeSymbols" class="m">Включить специальные символы</label>
    </div>

    <button onclick="generatePassword()" class="m">Сгенерировать пароль</button>
    
    <h2 class="m">Сгенерированный пароль:</h2>
    <p id="password"></p>
        </div>
        <div class="container">
            <h2>Введите свой пароль:</h2>
            <form action="informatika.php" method="post">
                <input type="text" name="parol"><br><br>
                <button>Отправить</button>
            </form>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $pass = $_POST['parol'];
                    echo hash('sha256', $pass);
                }
            ?>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer>
        <p>TheMath.NET, создатель: CapybaraABC.NET</p>
    </footer>
    <script>
        function generatePassword() {
            const length = parseInt(document.getElementById('length').value);
            const includeUppercase = document.getElementById('includeUppercase').checked;
            const includeNumbers = document.getElementById('includeNumbers').checked;
            const includeSymbols = document.getElementById('includeSymbols').checked;

            const b = 'abcdefghijklmnopqrstuvwxyz';
            const b1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const c = '0123456789';
            const s = '!"#$%^&*():;?.,/+_-=';

            let ob = b;

            if (includeUppercase) ob += b1;
            if (includeSymbols) ob += s;
            if (includeNumbers) ob += c;

            let password = '';
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * ob.length);
                password += ob[randomIndex];
            }
            
            document.getElementById('password').textContent = password;
        }
    </script>
  </body>
</html>