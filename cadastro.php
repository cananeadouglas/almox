<?php

$today = date("m.d.y");
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

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/bootstrap.min.js"></script>
    <script src="css/jquery.min.js"></script>
    <link rel="stylesheet" href="css/pucha_php.css">
    <title>Cadastro de produtos</title>
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

  <section>
       <div class="form-group">
            <form action="cad.php" method="POST">
                <h1 align="center">Cadastro de Produtos</h1>
                <label for="ex1">Descrição</label>
                <input class="form-control" name="desc" id="ex1" type="text" placeholder="Ex. Fita Backup - IBM - 1,5TB" required="required">

                <label for="ex3">Local de Armazenamento</label>
                <input class="form-control" name="local" id="ex3" type="text" placeholder="ex. Prateleira A-06" required="required">

                <label for="ex4">Valor do Produto</label>
                <input class="form-control" name="v_prod" id="ex4" type="number" step="0.01"placeholder="somente numeros, ex. 10.50 ou deixe vazio" required="required">
                
                <br><br>
                <input class="form-control" type="submit" value="Gravar Informação" >
            </form>
        </div>
</section>
<script src="script.js"></script>

</body>
</html>