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
        <form action="cartooo.php" method="post" class="container">
            <label>Введите имя</label><br><br>
            <input type="text" name="name"><br><br>
            <label>Введите ссылку на фото</label><br><br>
            <input type="text" name="photo"><br><br>
            <label>Введите текст</label><br><br>
            <textarea name="t"></textarea><br><br>
            <button>Загрузить</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $photo = trim($_POST['photo']);
            $t = trim($_POST['t']);

            if (empty($name) || empty($t)) {
                echo "error";
            }
            else {
                try {
                    $query = $pdo->prepare('INSERT INTO cartochka2(name, photo, t) VALUES(?, ?, ?)');
                    $query->execute([$name, $photo, $t]);
                    header('Location: cartooo.php');
                    exit;
                } catch (PDOException $e) {
                    die("error: " . $e->getMessage());
                }
            }
        }
        try {
            $query = $pdo->prepare('SELECT * FROM cartochka2 ORDER BY id DESC');
            $query->execute();
            $c = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($c as $b) {
                echo '
                <div class="container">
                    <h3>'.htmlspecialchars($b->name).'</h3>
                    <img src="'.htmlspecialchars($b->photo).'">
                    <p>'.htmlspecialchars($b->t).'</p>
                </div>
                ';
            }
        } catch (PDOException $e) {
            die("error" . $e->getMessage());
        }
        ?>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer>
        <p>TheMath.NET, создатель: CapybaraABC.NET</p>
    </footer>
  </body>
</html>