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
    <form action="" method="POST" name="diaex">
    <section>
        <div class="table-responsive">

        <h3 align="center">Lista de Registros</h3>

        <?php

        $usuario = $_SESSION['login'];

        include "connection.php";
        $sql = mysqli_query($conn,"select data_atual from estoque WHERE data_atual is not null GROUP BY 1 ORDER BY 1 desc;") or die(' Erro na query:' . $sql . ' ' . mysqli_error());

        echo "<label>Selecione o produto</label>
        <select class='form-control' name='sel1' id='sel1'>";

        while ($row = mysqli_fetch_array($sql)) 
        { 
        echo "<option>{$row['data_atual']}</option>";
        }
        echo "</select></p>";

        ?>

        <input class="form-control" type="submit" name="diaex" value="VER DETALHES DO DIA" >
        </div>
    </section>
    </form><br>

<section>

<?php
// carregando na mesma página dados da data escolhida.
if (!isset($_POST['sel1']))
{
  echo "aguardando";
}
else
{
  $selectdata = $_POST['sel1'];

  include "connection.php";
  $sql = mysqli_query($conn,"select p.descricao, p.local_setor, p.valor, e.quantidade, u.login from produto p inner join estoque e on p.id_prod = e.id_prod INNER join usuario u on u.id_user = e.id_user where e.data_atual = '$selectdata';") or die(' Erro na query:' . $sql . ' ' . mysqli_error() );

  echo "<table class='table table-hover'>";
  echo "<tr>";
  echo "<th>Login</th>";
  echo "<th>Descrição</th>";
  echo "<th>Guardado em:</th>";
  echo "<th>Valor do Produto</th>";
  echo "<th>Quantidade</th>";
  echo "</tr><tr>";

  while ($row = mysqli_fetch_array( $sql )) 
  { 
    echo "<td>{$row['login']}</td>";
    echo "<td>{$row['descricao']}</td>";
    echo "<td>{$row['local_setor']}</td>";
    echo "<td>{$row['valor']}</td>";
    echo "<td>{$row['quantidade']}</td></tr>";
  }
}

?>

</section>

<script src="script1.js"></script>

</body>
</html>