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
        <div class="table-responsive">

            <h3 align="center">Lista de Produtos Cadastrados</h3>

            <?php
                
            include "connection.php";
            $sql = mysqli_query($conn,"select descricao, local_setor, valor, quantidade from produto;") or die(' Erro na query:' . $sql . ' ' . mysqli_error() );

            echo "<table class='table table-hover'>";
            echo "<tr>";
            echo "<th>Descrição</th>";
            echo "<th>Local Guardado</th>";
            echo "<th>Valor do Produto</th>";
            echo "<th>Quantidade</th>";
            echo "</tr><tr>";

            while ($row = mysqli_fetch_array( $sql )) 
            { 
                echo "<td>{$row['descricao']}</td>";
                echo "<td>{$row['local_setor']}</td>";
                echo "<td>{$row['valor']}</td>";
                echo "<td>{$row['quantidade']}</td></tr>";
            }

            ?>

        </div>
    </section>

<script src="script1.js"></script>

</body>
</html>