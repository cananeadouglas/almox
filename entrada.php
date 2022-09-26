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

// nome do usuário
$sql = mysqli_query($conn,"SELECT nome FROM usuario WHERE login = '$login' ") or die('Erro na query:' . $sql . ' ' . mysqli_error());

while ($row = mysqli_fetch_array( $sql )) 
{ 
      $nome = $row['nome']; 
}

//echo utf8_encode("$nome");
//echo $date; 

// quantidade total em reais
$sql1 = mysqli_query($conn,"select sum(valor * quantidade) as total from produto;") or die('Erro na query:' . $sql1 . ' ' . mysqli_error());

while ($row = mysqli_fetch_array( $sql1 )) 
{ 
      $total = $row['total']; 
}


$sql2 = mysqli_query($conn,"select sum(quantidade) as total1 from produto;") or die('Erro na query:' . $sql2 . ' ' . mysqli_error());

while ($row = mysqli_fetch_array( $sql2 )) 
{ 
      $total1 = $row['total1']; 
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <script src="css/bootstrap.min.js"></script>
    <script src="css/jquery.min.js"></script>
    <title>Principal</title>

</head>
<body onload="teste()">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="entrada.php">Almoxarifado</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="cadastro.php">Cadastro de materiais</a></li>
        <li><a href="lista.php">Lista de Produtos</a></li>
        <li><a href="add.php">Adicionar/Excluir</a></li>
        <li><a href="reg.php">Registros</a></li>
        <li><a href="consulta.php">Consultar</a></li>
        <li id="saindo"><a href="?deslogar">Sair</a></li>
        
      </ul>
    </div>
  </nav>

<div class="container">
  <h3></h3>
  <p></p>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
<p class="w3-image" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-black"><span class="w3-padding w3-black w3-opacity-min"><b><?php echo utf8_encode("Bem vindo(a) $nome"); ?></b></span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" name="vem" style="max-width:1564px">

 <!-- Project Section -->
 <div class="w3-padding-32" >
    <h3 class="w3-border-bottom w3-border-light-grey:hover w3-padding-16" >Informações:</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-container w3-green" align="center"><?php echo utf8_encode("Valor total em Estoque:<br> R$ $total"); ?></div>
        
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-container w3-green" align="center"><?php echo utf8_encode("Produtos em Estoque:<br> $total1 unid."); ?></div>
        
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-container w3-green">Renovated</div>
        
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-container w3-green">Barn House</div>
        
      </div>
    </div>
  </div>

  <script type="text/javascript" src="script1.js"></script>

</body>
</html>