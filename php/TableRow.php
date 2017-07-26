<?php // сохранить в utf-8 !
$mysql_host = "localhost"; // sql сервер
$mysql_user = "root"; // пользователь
$mysql_password = ""; // пароль
$mysql_database = "personadress"; // имя базы данных chat

if (isset($_GET["action"])) { 
    $action = $_GET['action'];
}
if (isset($_GET["data"])) { 
    $data = $_GET['data'];
}
$link = mysqli_connect($mysql_host, $mysql_user, $mysql_password); // коннект к серверу SQL
mysqli_select_db($link, $mysql_database); // коннект к БД на сервере
mysqli_set_charset($link, 'utf8'); // кодировка

$command = "SELECT Id, FirstName, LastName, Age, Id_Street FROM person;"
if ($action == read)
	$q=mysqli_query($link, $command);

mysqli_close();
?>