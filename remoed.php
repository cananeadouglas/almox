<?php

$today = date("y.m.d");
//echo $today;

session_start();

if(!isset($_SESSION['login'])){
  header("Location: index.php");
  session_destroy();
}

if(isset($_GET['deslogar'])){
  session_destroy();
  header("Location: index.php");
}

$usuario = $_SESSION['login'];
$descri = $_POST['sel1'];
$quantidade_page = $_POST['v_quant'];

//echo $usuario." ";
//echo $descri." ";
//echo $quantidade_page." ";
//echo $today;

// recuperando id_prod na tabela produto
include "connection.php";

$sql3 = "SELECT id_prod FROM produto WHERE descricao = '$descri';";
$result2 = mysqli_query($conn, $sql3);
$fetch2 = mysqli_fetch_assoc($result2);
$fetch2 = array_shift($fetch2);

$id_prod = $fetch2;
//echo $id_prod;

//recuperando id_user na tablea usuario
$sql4 = "SELECT id_user FROM usuario WHERE login = '$usuario';";
$result4 = mysqli_query($conn, $sql4);
$fetch1 = mysqli_fetch_assoc($result4);
$fetch1 = array_shift($fetch1);

$id_user = $fetch1;
//echo $id_user;

//recuperando quantidade na tablea produto pelo id_prod
$sql5 = "SELECT quantidade FROM produto WHERE id_prod = '$id_prod';";
$result6 = mysqli_query($conn, $sql5);
$fetch6 = mysqli_fetch_assoc($result6);
$fetch6 = array_shift($fetch6);

$quantidade = $fetch6;
//echo $id_user;
//echo $quantidade;
$quantidade_page*=-1;
//echo $quantidade_page;

if($quantidade_page <= $quantidade){
	echo $total = ($quantidade - $quantidade_page);
	// inserindo dados na tabela estoque
	$quantidade_page*=-1;
	$sql7 = "INSERT INTO estoque (data_atual, id_user, id_prod, quantidade) 
	VALUE ('$today', '$id_user', '$id_prod', '$quantidade_page'); ";
	mysqli_query($conn,$sql7) or die(mysqli_error());

	$sql8 = "UPDATE produto 
	SET quantidade = '$total'
	WHERE id_prod = '$id_prod';";
	mysqli_query($conn,$sql8) or die(mysqli_error());

	echo"<script language='javascript' type='text/javascript'>
	alert('Registrado com Sucesso');window.location
	.href='add.php';</script>";
}else{
	echo"<script language='javascript' type='text/javascript'>
	alert('Quantidade digitada para remoção é maior do que a quantidade em Estoque. Refaça sua operação.'); window.history.back();</script>";
}

?>