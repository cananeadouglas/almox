<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$login = $_POST['login'];
$senha = $_POST['pass'];

include "connection.php";

$sql = mysqli_query($conn,"select login from usuario where login = '$login' and senha = '$senha';") or die(mysqli_error());

$row = mysqli_num_rows($sql);
if($row > 0){
    session_start();
	$_SESSION['login'] = $login;
    echo"<script language='javascript' type='text/javascript'>
        alert('Você esta logado');window.location
        .href='entrada.php';</script>";
}
else{
    echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.php';</script>";
        mysqli_close();
}
?>

</body>
</html>