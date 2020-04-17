<?php

$descricao = $_POST['desc'];
$local_setor = $_POST['local'];
$valor = $_POST['v_prod'];
$usuario = $_SESSION['login'];

include "connection.php";

$sql1 = "INSERT INTO produto (descricao, local_setor, valor) VALUE ('$descricao', '$local_setor', '$valor'); ";

mysqli_query($conn,$sql1) or die(mysqli_error());

echo"<script language='javascript' type='text/javascript'>
alert('Registrado com Sucesso');window.location
.href='cadastro.php';</script>";

?>