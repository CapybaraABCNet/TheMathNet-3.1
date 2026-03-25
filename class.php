<?php
require_once 'init.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parol = trim($_POST['pass']);
    $name = trim($_POST['name']);
    $title = trim($_POST['title']);
    $text = trim($_POST['t']);
    $im = trim($_POST['im']);

    if (empty($name) || empty($title) || empty($text) || empty($parol))      {
        echo "Вы ввели не все обязательные таблицы (имя, класс, текст, пароль)";
    }
    else {
        $password = 'd49d96bc626b1a80d41dc221662d19b6bcaf7f80e1218db3f10cafeab559be52';
        $parol1 = hash('sha256', $parol);
        if (hash_equals($password ,$parol1)) {
            try {
                $query = $pdo->prepare('INSERT INTO class(name, title, t, im) VALUES(?, ?, ?, ?)');
                $query->execute([$name, $title, $text, $im]);
                header('Location: class.php');
                exit;
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        } else {
            echo "Пароль неверный!";
        }
    }
}
try {
    $query = $pdo->prepare('SELECT * FROM class  WHERE title = ? ORDER BY `time` DESC');
    $query->execute(['5п']);
    $c = $query->fetchAll(PDO::FETCH_OBJ);

} catch (PDOException $e) {
    die("error: " . $e->getMessage());
}
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
        <h2>Все классы</h2>
        <div class="container">
            <h3>5П</h3>
            <button onclick="(document.getElementById('ex').style.display='block')">Показать</button>
            <button onclick="(document.getElementById('ex').style.display='none')">Скрыть</button>
            <div class="container" id="ex" style="display: none;">
                <?php
                foreach ($c as $b) {
                     $formated_date = date('d.m.Y H:i', strtotime($b->time));
                    
                        echo '
                        <div>
                            <h3>Учитель: '.htmlspecialchars($b->name).'</h3>
                            <h4>Класс: '.htmlspecialchars($b->title).'</h4>
                            <p>'.htmlspecialchars($b->t).'</p>
                            <img src="'.htmlspecialchars($b->im).'">
                            <p>'.$formated_date.'</p>
                        </div>
                        ';
                    
                }
                ?>
            </div>
        </div>        
    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer>
        <p>TheMath.NET, создатель: CapybaraABC.NET</p>
    </footer>
  </body>
</html>