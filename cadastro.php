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

  <section>
    <div class="form-group">
      <form action="cad.php" method="POST">
        <h3 align="center">Cadastro de Produtos</h3>
        <label>Descrição</label>
        <input class="form-control" name="desc" id="ex1" type="text" placeholder="Ex. Fita Backup - IBM - 1,5TB" required="required"><br>

        <label>Local de Armazenamento</label>
        <input class="form-control" name="local" id="ex3" type="text" placeholder="ex. Prateleira A-06" required="required"><br>

        <label>Valor do Produto</label>
        <input class="form-control" name="v_prod" id="ex4" type="number" step="0.01"placeholder="somente valores, ex. 10.50" required="required"><br>
                
        <br><br>
        <input class="form-control" type="submit" value="Gravar Informação" >
      </form>
    </div>
</section>
<script src="script1.js"></script>

</body>
</html>