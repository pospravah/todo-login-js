<!--form action="" method="post"><input type='submit' name='exit' value='�����'/></form-->
<?php
if($_REQUEST['exit']) 
  {
        setcookie('id', '', time() - 60*60*24*30, '/'); 
        setcookie('hash', '', time() - 60*60*24*30, '/');
        header('Location: /login.html#login'); exit();
  }
?>