<?php
  session_start();

  if(isset($_SESSION['login'])){
    header("Location: entrada.php");
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
    <title>Portal Almoxarifado</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="teste()">

<br><br><br><br><br>
    <h2 align="center">Seja bem vindo, Portal do Almoxarifado</h2><br>

    <div>
        <form action="action.php" method="POST">

        <div class="container">
            <label for="login"><b>Username</b></label><br>
            <input type="text" placeholder="Enter Username" name="login" id="login" required><br>

            <label for="pass"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="pass" id="pass" required><br><br>
                
            <button type="submit">Fazer Login</button><br>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label><br><br><br>
            
        </div>
        </form>
    </div>

    <script src="script1.js"></script>

</body>
</html>
