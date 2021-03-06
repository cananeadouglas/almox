<?php
session_start();

if(!isset($_SESSION['login'])){
  header("Location: index.php");
  session_destroy();
}

if(isset($_GET['deslogar'])){
  session_destroy();
  header("Location: index.php");
}

//echo $_SESSION['login'];
$login = $_SESSION['login'];
//echo $login;
include "connection.php";

/*
$sql = mysqli_query($conn,"SELECT nome FROM usuario WHERE login = '$login' ") or die(' Erro na query:' . $sql . ' ' . mysqli_error() );

while ($row = mysqli_fetch_array( $sql )) 
{ 
      print $row[codigo] . " -- " . $row[nome] . " -- " . $row[endereco]; 
}
*/

$sql = mysqli_query($conn,"SELECT nome FROM usuario WHERE login = '$login' ") or die('Erro na query:' . $sql . ' ' . mysqli_error());

while ($row = mysqli_fetch_array( $sql )) 
{ 
      $nome = $row[nome]; 
}

//echo utf8_encode("$nome");
$date = Date;
//echo $date;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/bootstrap.min.js"></script>
    <script src="css/jquery.min.js"></script>
    <title>Principal</title>
</head>
<body onload="teste()">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="entrada.php">Almoxarifado Atacadão Maceió Praia</a>
      </div>
      <ul class="nav navbar-nav">
        <li id="cadastro"><a href="cadastro.php">Cadastro de materiais</a></li>
        <li id="consulta"><a href="lista.php">Lista de Produtos</a></li>
        <li id="entrada"><a href="#">Entradas</a></li>
        <li id="saida"><a href="#">Saidas</a></li>
        <li id="saindo"><a href="?deslogar">Sair</a></li>
        
      </ul>
    </div>
  </nav>

<div class="container">
  <h3><?php echo utf8_encode("Seja bem Vindo(a): $nome"); ?></h3>
  <p>O Atacadão está capacitado para atender às redes de supermercados e aos comércios em geral, entregando as mercadorias em qualquer parte do país. O cliente sempre encontra um mix de produtos podendo efetuar seus pedidos por telefone ou solicitar um representante.</p>
</div>

<script src="script.js"></script>

</body>
</html>