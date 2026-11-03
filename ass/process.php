<?php
$login =$_POST['login'];
$password=$_POST['password'];

echo"Login: " .
htmlspecialchars($login);

echo"<br>";

echo"Password: " .
htmlspecialchars($password);
?>