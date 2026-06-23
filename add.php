<?php

$server = "localhost";
$user = "user";
$pass = "user";
$db = "wiadomości";

if(!($conn = mysqli_connect($server, $user, $pass, $db)
)){
    echo "<h1>Błąd</h1>";                     
} else {
    if (isset($_POST['submit']) ){
    $temat = $_POST['temat'];
    $tresc = $_POST['tresc'];
    if (empty($temat) && strlen($temat) < 5 && strlen($tresc) < 10){
    echo "<h1>Problem z prowadzanimy informacjami.</h1>";     
    } else {
    $sql = "INSERT INTO wiadomości(wiadomości.temat, wiadomości.tresc) VALUES ('$temat','$tresc')";
    if (mysqli_query($conn, $sql)) {
    echo "<div class=\"alert alert-success\" role=\"alert\">Dodano ogłoszenia prawidłowo</div>";
    }
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




<div class="col-4">
<h3 class="text-center">Dodawania ogłoszenia</h3>
<h1 class="text-center">Pomoc:</h1>
    <ol>
        <li>Ogłoszenia dodaje osoba zalogowana</li>
        <li>Data dodania jest dodawana automatycznie</li>

</div>

<div class="col-8">
<form id="form" action="add.php" method="post">
        <div>
            <label for="temat">Temat: </label>
            <input class="form-control" type="text" id="temat" name="temat">
            <div id="textareaNewsHelp" class="form-text">
                Podaj temat.
            </div>
        </div>
        <div>
           <label for="tresc">Tresc: </label>
           <textarea class="form-control" id="tresc" name="tresc"  rows="10" cols="100"></textarea>
           <div id="textareaNewsHelp" class="form-text">
                Podaj treść.
            </div>
        </div>
        <div class="mb-3">
        <input type="reset" value="Wyczysc" class="btn btn-secondary">
        </div>
        <button id="submit" type="submit" name="submit" class="btn btn-primary">Dodaj</button>
</form>

</div>
<?php
}
?>
    <script src="./js/boostrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>