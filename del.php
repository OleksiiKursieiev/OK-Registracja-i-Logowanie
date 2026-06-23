<?php

$server = "localhost";
$user = "user";
$pass = "user";
$db = "wiadomości";

if(!($conn = mysqli_connect($server, $user, $pass, $db)
)){
    echo "<h1>Błąd</h1>";                     
} else {
    if (isset($_POST['id_wia'])) {
        $id = $_POST['id_wia'];
        $sql = "SELECT * FROM wiadomości WHERE id_wia = $id;";

        $res = mysqli_query($conn, $sql);
        $item = mysqli_fetch_assoc($res);
    }
    if (isset($_POST['submit']) && isset($_POST['id_wia'])) {
        $id = $_POST['id_wia'];
        $sql2 = "UPDATE wiadomości SET tresc='Treść była usunięta' WHERE id_wia = $id;";
        if (mysqli_query($conn, $sql2)) {
            header('Location: index.php');
        }
    }
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">BIP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Strona główna <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">Dodaj ogłoszenie</a>
      </li>
    </ul>
  </div>
</nav>
<form id="form" action="del.php" method="post">
        <input type="hidden"  name="id_wia" value="<?php echo $item['id_wia']; ?>">
        <div>
            <label for="temat">Temat: </label>
            <div id="temat" name="temat"><?php echo $item['temat'] ?? ''; ?></div>
        </div>
        <div>
           <label for="tresc">Tresc: </label>
           <div id="tresc"><?php echo $item['tresc'];?></div>
        </div>
        <button id="submit" type="submit" name="submit">Czy naprawdę chcesz usunąć tą informacje?</button>
</form>
<?php
}

?>
    <script src="./js/boostrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>