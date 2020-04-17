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
        <li id="cadastro"><a href="#">Cadastro</a></li>
        <li id="consulta"><a href="#">Consulta</a></li>
        <li id="entrada"><a href="#">Entradas</a></li>
        <li id="saida"><a href="#">Saidas</a></li>
        <li id="saindo"><a href="?deslogar">Sair</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <h3>Basic Navbar Example</h3>
  <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
</div>

<script src="script.js"></script>

<?php
//echo $_SESSION["login"];
?>

</body>
</html>