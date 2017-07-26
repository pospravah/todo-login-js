<?php
  # Функция для генерации случайной строки 
  function generateCode($length=6) { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
    $code = ""; 
    $clen = strlen($chars) - 1;

    while (strlen($code) < $length) { 
        $code .= $chars[mt_rand(0,$clen)];   
    } 
    return $code; 
  } 
  
  # Если есть куки с ошибкой то выводим их в переменную и удаляем куки
  if (isset($_COOKIE['errors'])){
      $errors = $_COOKIE['errors'];
      setcookie('errors', '', time() - 60*24*30*12, '/');
  }

  # Подключаем конфиг
  include 'conf.php';

  if(isset($_POST['submit'])) 
  {
	// $login = htmlspecialchars($_POST["login"]);
  $login = $_POST["login"];
	print "Вы ввели логин: ".$login."<br>";

  $password = htmlspecialchars($_POST["password"]);
  $submit = htmlspecialchars($_POST["submit"]);
	

    # Вытаскиваем из БД запись, у которой логин равняеться введенному 
    #$data = mysql_fetch_assoc(mysql_query("SELECT users_id, users_password FROM `users` WHERE `users_login`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1")); 
  $query1 = "SELECT `users_id`, `users_password` FROM `users` WHERE `users_login`='".$login."' LIMIT 1";
	$data = mysqli_fetch_assoc(mysqli_query($link, $query1)); 
	// echo "data:"+$data;
     
    # Сравниваем пароли 
    if($data['users_password'] === md5(md5($_POST['password']))) 
		
	#	if($data['users_password'] === ($_POST['password']) 
    { 
	  # Генерируем случайное число и шифруем его 
      $hash = md5(generateCode(10)); 
           
      # Записываем в БД новый хеш авторизации и IP 
	  // echo $query2;
      mysqli_query($link, "UPDATE users SET users_hash='".$hash."' WHERE users_id='".$data['users_id']."'") or die("MySQL Error: " . mysql_error()); 
       
      # Ставим куки 
      setcookie("id", $data['users_id'], time()+60*60*24*30); 
      setcookie("hash", $hash, time()+60*60*24*30); 
       
      # Переадресовываем браузер на страницу проверки нашего скрипта 
      header("Location: check.php");
      print "Вы ввели правильный логин/пароль<br>";
      header("Location: ../todo.html");
      exit();
	  } 
    else 
    { 
      print "Это неправильный логин/пароль<br>";
    } 
  } 
?>