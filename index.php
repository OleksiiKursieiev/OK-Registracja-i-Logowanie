<?php

$server = "localhost";
$user = "user";
$pass = "user";
$db = "wiadomości";

if(!($conn = mysqli_connect($server, $user, $pass, $db)
)){
    echo "<h1>Błąd</h1>";                     
} else {

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



    <div>Logowanie</div>
    <form action="index.php" method="get">
    <input type="text" name="login"></input>
    <label for="login">Login</label>
    <input type="password" name="pass"></input>
    <label for="pass">Hasło</label>
    <input type="submit" name="submit" value="Zalogój"></input>
  </form>

<?php

  $sql = "SELECT * FROM wiadomości;";
  $res = mysqli_query($conn, $sql);
  foreach ($res as $item) {
    if ($item['tresc'] == "Treść była usunięta") {
    echo "<div class=\"text-decoration-line-through\">" . $item['temat'] . "</div>";
    echo "<div>" . $item['tresc'] . "</div>"; 
    echo "<br>" . "Data dodania ogłoszenia: " . $item['data_dod'];
    echo "<br>" . "Data usunięcia ogłoszenia:";
    echo "<br>" . "Osoba dodająca:";
    echo "<br>" . "Osoba usuwająca:";
    } else {
    echo "<div>" . $item['temat'] . "</div>";
    echo "<div>" . $item['tresc'] . "</div>";
    echo "<br>" . "Data dodania ogłoszenia: " . $item['data_dod'];
    echo "<br>" . "Data modifikacji ogłoszenia:";
    echo "<br>" . "Data usunięcia ogłoszenia:";
    echo "<br>" . "Osoba dodająca:";
    echo "<br>" . "Osoba modifikująca:";
    echo "<br>" . "Osoba usuwająca:";
    echo "<form action=\"del.php\" method=\"post\">";
    echo "<input type=\"text\" value=" . $item['id_wia'] . " name=\"id_wia\" hidden>";
    echo "<input type=\"submit\" value=\"Usuń wiadomosc\" class=\"btn btn-danger\">";
    echo "</form>";
    echo "<form action=\"edit.php\" method=\"post\">";
    echo "<input type=\"text\" value=" . $item['id_wia'] . " name=\"id_wia\" hidden>";
    echo "<input type=\"submit\" value=\"Edytuj wiadomosc\" class=\"btn btn-warning\">";
    echo "</form>";
    echo "<br>";
    }
  }
}





?>

  <script src="./js/boostrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>