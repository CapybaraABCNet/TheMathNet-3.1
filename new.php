<?php
require_once 'init.php';
?>
<?php
  		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  			$parol = trim($_POST['passwor']);
  			$title = trim($_POST['title']);
  			$t = trim($_POST['t']);
  			$im = trim($_POST['im']);

  			if (empty($parol) || empty($title) || empty($t)) {
  				echo 'Error';
  				
  			}
  			else {
  					$paroll = 'b0b823b44f1c78990cbb155e93574aa5db4a5dca25788884b96f0e9f73c5984c';
  					$input_password_hash = hash('sha256', $parol);
  					if (hash_equals($paroll, $input_password_hash)) {
  						try {
  							$sql = 'INSERT INTO newsti(title, t, im) VALUES(?, ?, ?)';
  						    $query = $pdo->prepare($sql);
  						    $query->execute([$title, $t, $im]);
  						     header("Location: " . $_SERVER['PHP_SELF']);
                            exit;
  						} catch (PDOException $e) {
                			die("eRROR" . $e->getMessage());
                		}
  					} else {
  						echo "error";
  						
  					}
  			}
  		}
  		try {
  			$sql = 'SELECT * FROM newsti ORDER BY id DESC';
  			$query = $pdo->prepare($sql);
  			$query->execute(); 
  			$c = $query->fetchAll(PDO::FETCH_OBJ);
  		} catch (PDOException $e) {
  			die("eRROR" . $e->getMessage());
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
  		<h2>Новости сайта, математике и IT</h2>
  		<?php foreach ($c as $b) {
  				echo '
  				<div class="container">
  				    <h3>'.htmlspecialchars($b->title).'</h3>
  				    <p>'.htmlspecialchars($b->t).'</p>
  				    <img src="'.htmlspecialchars($b->im).'">
  				</div>
  				';
  			}
  		?>
    </div>    
    <br><br><br><br>
    <footer>
        <p>TheMath.NET, создатель: CapybaraABC.NET</p>
    </footer>
  </body>
</html>