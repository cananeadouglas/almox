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

        <h3 align="center">Consultar</h3>

        <label>Consulte por login, valor, descricao do produto ou local armazenado</label>
        <input class="form-control" id="valordigitado" name="consult" type="text" placeholder="digite aqui" required="required"><br><br>
        
        <input class="form-control" type="submit" value="Pesquisar" >
        </div>
    </section>
    </form><br>

<section>

<?php
// carregando na mesma página dados da data escolhida.
if (!isset($_POST['consult']))
{
  echo "aguardando";
}
else
{
  $sele = $_POST['consult'];
  include "connection.php";

  $sql2 = mysqli_query($conn, "SELECT u.login, p.descricao, p.local_setor, p.valor, p.quantidade  FROM produto p, usuario u WHERE p.descricao like '%$sele%' or p.valor like '%$sele%' or p.local_setor like '%$sele%' or u.login like '%$sele%' or p.quantidade like '%$sele%'") or die(mysqli_error());
$row = mysqli_num_rows($sql2);

if($row > 0){

  echo "<table class='table table-hover'><tr>";
  echo "<th>Login</th>";
  echo "<th>DESCRIÇÃO</th>";
  echo "<th>LOCAL</th>";
  echo "<th>VALOR</th>";
  echo "<th>QUANTIDADE</th>";
  echo "</tr><tr><br/>";

  while($linha = mysqli_fetch_array($sql2)){

  //echo "<td align='center'>{$linha['nome']}</td>";
  echo "<td>{$linha['login']}</td>";
  echo "<td>{$linha['descricao']}</td>";
  echo "<td>{$linha['local_setor']}</td>";
  echo "<td>{$linha['valor']}</td>";
  echo "<td>{$linha['quantidade']}</td>";
  echo "</tr>";
}
  echo "</table><br/>";

}else{
  echo "<h4><center>nenhum encontrado, digite novamente</center></h4>";
}
}

?>

</section>

<script src="script1.js"></script>

</body>
</html>