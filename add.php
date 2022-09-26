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
    <link rel="stylesheet" href="css/pucha_php2.css">
    <title>Adicionar ao Estoque</title>
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
<center>
<section class="adicionar">
    <div class="table-responsive">
        <form action="added.php" method="POST">
        
        <h3 align="center">Adicionar Quantidade ao Produto</h3>

        <?php
        $usuario = $_SESSION['login'];

        include "connection.php";
        $sql = mysqli_query($conn,"SELECT descricao FROM produto;") or die(' Erro na query:' . $sql . ' ' . mysqli_error());

        echo "<label>Selecione o produto</label>
        <select class='form-control' name='sel1' id='sel1'>";

        while ($row = mysqli_fetch_array($sql)) 
        { 
        echo "<option>{$row['descricao']}</option>";
        }
        echo "</select></p>";

        ?>

        <label>Quantidade para adicionar</label>
        <input class="form-control" id="valordigitado" name="v_quant" type="number" placeholder="Digite o valor para acrescentar ou diminuir ao estoque" required="required" min="1" max="99999" value="1"><br><br>
        
        <input class="form-control" type="submit" value="ADICIONAR" >

        </form>
    </div>
</section>

<section class="remover">
    <div class="table-responsive">
        <form action="remoed.php" method="POST">
        
        <h3 align="center">Remover Quantidade ao Produto</h3>

        <?php
        $usuario = $_SESSION['login'];

        include "connection.php";
        $sql = mysqli_query($conn,"SELECT descricao FROM produto;") or die(' Erro na query:' . $sql . ' ' . mysqli_error());

        echo "<label>Selecione o produto</label>
        <select class='form-control' name='sel1' id='sel1'>";

        while ($row = mysqli_fetch_array($sql)) 
        { 
        echo "<option>{$row['descricao']}</option>";
        }
        echo "</select></p>";

        ?>

        <label>Quantidade para remover</label>
        <input class="form-control" id="valordigitado" name="v_quant" type="number" placeholder="Digite o valor para acrescentar ou diminuir ao estoque" required="required" min="-99999" max="-1" value="-1" ><br><br>
        
        <input class="form-control" type="submit" value="REMOVER" >

        </form>
    </div>
</section>
</center>
<script src="script1.js"></script>

</body>
</html>