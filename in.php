
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
    <br><br><br><br>
  	<form action="in.php" method="post" class="container">
    	<label>Введите здесь своё имя</label><br><br>
    	<input type="text" name="name"><br><br>
    	<label>Введите здесь свой пароль</label><br>
    	<input type="password" name="pass"><br><br>
    	<button>Ввести</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $pass = $_POST['pass'];

    if (empty($name) || empty($pass)) {
        echo "error";
    }

    try {
        $password_t = password_hash($pass, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO forum1(name, pass) VALUES(?, ?)';
        $query = $pdo->prepare($sql);
        $query->execute([$name, $password_t]);
        echo "<p class='text'>привет ", $name, '</p>';
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <p>TheMath.NET, создатель: CapybaraABC.NET</p>
    </footer>
  </body>
</html>