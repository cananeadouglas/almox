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
        <div class="table-responsive">

            <h1 align="center">Lista de Produtos Cadastrados</h1>

            <?php
                
            include "connection.php";
            $sql = mysqli_query($conn,"SELECT descricao, local_setor, valor FROM produto ORDER BY 1;") or die(' Erro na query:' . $sql . ' ' . mysqli_error() );

            echo "<table class='table table-hover'>";
            echo "<tr>";
            echo "<th>Descrição</th>";
            echo "<th>Local Guardado</th>";
            echo "<th>Valor do Produto</th>";
            echo "</tr><tr>";

            while ($row = mysqli_fetch_array( $sql )) 
            { 
                echo "<td>{$row['descricao']}</td>";
                echo "<td>{$row['local_setor']}</td>";
                echo "<td>{$row['valor']}</td></tr>";
            }

            ?>

        </div>
    </section>

<script src="script.js"></script>

</body>
</html>