<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>

    <?php
    $query = "select * from recept where id=" . $_GET['id'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "recepti";
    $connection = new mysqli($hostname, $username, $password, $dbname);

    $result = $connection->query($query);
    $recept = mysqli_fetch_object($result);
    ?>

    <form method="post" class="text-center" id="forma-izmena">

        <input type="hidden" class="form-control" name="hidden-izmena-id" value="<?php echo $recept->id; ?>">

        <div class="mb-3">
            <label class="form-label">Naslov: </label>
            <input type="text" class="form-control" name="naslov" value="<?php echo $recept->naslov; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Kraći opis: </label>
            <input type="text" class="form-control" name="kraci_opis" value="<?php echo $recept->kraci_opis; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Tekst: </label>
            <textarea class="form-control" name="tekst" rows="8"><?php echo $recept->tekst; ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategorija: </label>
            <input type="text" class="form-control" name="kategorija" value="<?php echo $recept->kategorija; ?>">
        </div>

        <input type="hidden" class="form-control" name="hidden-izmena-korisnik" value="<?php echo $recept->korisnik_id; ?>">

        <button type="submit" name="btn_sacuvaj_izmene" class="btn btn-primary">Sačuvaj izmene</button>
    </form>

    <?php
    include 'Recept.php';

    if (isset($_POST['btn_sacuvaj_izmene'])) {

        $recept = new Recept();
        if ($recept->sacuvajIzmene($_POST['hidden-izmena-id'], $_POST['naslov'], $_POST['kraci_opis'], $_POST['tekst'], $_POST['kategorija'], $_POST['hidden-izmena-korisnik'])) {
            header('Location: index.php');
        } else {
            echo 'Greska!';
        }
    }

    ?>

</body>

</html>