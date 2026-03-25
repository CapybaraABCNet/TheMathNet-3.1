<?php
require_once 'init.php';
?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'delete_post') {
	if (!isset($_COOKIE['name'])) {
    	die("Доступ запрещён, вы не вошли в систему");
    }

	$post_id = $_GET['id'];
	$current_user =  $_COOKIE['name'];

	$query = $pdo->prepare('SELECT name FROM foru WHERE id = ?');
	$query->execute([$post_id]);
	$post_to_delete = $query->fetch(PDO::FETCH_OBJ);

	if ($post_to_delete && $post_to_delete->name === $current_user) {
		$query = $pdo->prepare('DELETE FROM foru WHERE id = ?');
		$query->execute([$post_id]);
	}

	header("Location: forum.php");
	exit;
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_COOKIE['name'])) {
        die("Ошибка: вы не авторизованы. Сначала войдите.");
    }
	$imya = $_COOKIE['name'];
	$text = trim($_POST['text']);
	$title = trim($_POST['title']);
	$photo = trim($_POST['photo']);

	if (empty($text) || empty($title)) {
		echo "Error";
		exit;
	}
	else {
	    try {
		    $sql = 'INSERT INTO foru(name, title, `text`, photo) VALUES(?, ?, ?, ?)';
		    $query = $pdo->prepare($sql);
		    $query->execute([$imya, $title, $text, $photo]);
		    header('Location: forum.php');
		    exit;
	    } catch (PDOException $e) {
		    die("Error" . $e->getMessage());
	    }
    }
}
?>
<?php
try {
	$sql = 'SELECT * FROM foru ORDER BY create1 DESC';
	$query = $pdo->prepare($sql);
	$query->execute();
	$c = $query->fetchAll(PDO::FETCH_OBJ);

} catch (PDOException $e) {
	die("Error" . $e->getMessage());
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
  	<form action="forum.php" method="post" class="container">
  		<label>Введите здесь заголовок</label><br>
		<input type="text" name="title"><br>
		<label>Введите здесь текст сообщения</label><br>
		<input type="text" name="text"><br>
		<label>Введите здесь ссылку на фото</label><br>
		<input type="text" name="photo"><br>
		<button>Отправить сообщение</button><br>
	</form>
	<div class="container">
 		<?php foreach ($c as $post): ?>
 			<?php $formated_date = date('d.m.Y H:i', strtotime($post->create1)); ?>
 		    <div>
 		        <h3>Автор: <?= htmlspecialchars($post->name) ?></h3>
 		        <h2><?= htmlspecialchars($post->title) ?></h2>
 		        <?php if (!empty($post->photo)): ?>
 		            <img src="<?= htmlspecialchars($post->photo) ?>" alt="Фото">
 		        <?php endif; ?>
 		        <p><?= nl2br(htmlspecialchars($post->text)) ?></p>
 		        <p><?= htmlspecialchars($post->create1) ?></p>
 		        
 		        
 		        <?php if (isset($_COOKIE['name']) && $post->name === $_COOKIE['name']) { ?>
 		            <br>
 		            <a href="?action=delete_post&id=<?= $post->id ?>" 
 		               onclick="return confirm('Ты уверен?');" 
 		               style="color: red;">Удалить пост</a>
 		        <?php } ?>
 		    </div>
 		<?php endforeach; ?>
    </div>
    <br><br><br><br>
    <footer>
    	<p>TheMath.NET, создатель: CapybaraABC.NET</p>
    </footer>
  </body>
</html>
