<?php

$today = date("d.m.y");
//echo $today;

$descricao = $_POST['desc'];
$local_setor = $_POST['local'];
$valor = $_POST['v_prod'];
$usuario = $_SESSION['login'];
//$quantidade = $_POST['quanti'];

include "connection.php";

//inserindo na tabela produto
$sql1 = "INSERT INTO produto (descricao, local_setor, valor, data_entrada) VALUE ('$descricao', '$local_setor', '$valor', '$today'); ";
mysqli_query($conn,$sql1) or die(mysqli_error());

echo"<script language='javascript' type='text/javascript'> alert('Registrado com Sucesso');window.location.href='cadastro.php';</script>";

/*
include "connection.php";

//recuperando id_user na tablea usuario
$sql4 = "SELECT id_user FROM usuario WHERE login = '$usuario';";
$result4 = mysqli_query($conn, $sql4);
$fetch1 = mysqli_fetch_assoc($result4);
$fetch1 = array_shift($fetch1);
$id_user = $fetch1;
echo id_user;

echo $usuario." ";
echo $descricao." ";
echo $quantidade." ";
echo $today;

// recuperando id_prod na tabela produto
$sql3 = "SELECT id_prod FROM produto WHERE descricao = '$descricao';";
$result2 = mysqli_query($conn, $sql3);
$fetch2 = mysqli_fetch_assoc($result2);
$fetch2 = array_shift($fetch2);
$id_prod = $fetch2;
echo id_prod;

//inserindo na tablea estoque
$sql2 = "INSERT INTO estoque (data_atual, id_user, id_prod, quantidade) VALUE ('$today', '$id_user', '$id_prod', '$quantidade'); ";

mysqli_query($conn,$sql2) or die(mysqli_error());


echo"<script language='javascript' type='text/javascript'>
alert('Registrado com Sucesso');window.location
.href='cadastro.php';</script>";

mysqli_close(); */


?>