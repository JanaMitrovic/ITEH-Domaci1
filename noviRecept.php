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
    <form method="post" class="text-center" id="forma-izmena">


        <div class="mb-3">
            <label class="form-label">Naslov: </label>
            <input type="text" class="form-control" name="naslov">
        </div>
        <div class="mb-3">
            <label class="form-label">Kraći opis: </label>
            <input type="text" class="form-control" name="kraci_opis">
        </div>
        <div class="mb-3">
            <label class="form-label">Tekst: </label>
            <textarea class="form-control" name="tekst" rows="8"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategorija: </label>
            <input type="text" class="form-control" name="kategorija">
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Korisnik: </label>
            <select class="form-select" name="korisnik">
                <?php
                $query = "select id,username from korisnik";
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $db = "recepti";
                $connection = new mysqli($hostname, $username, $password, $db);
                $result = $connection->query($query);

                while ($korisnik = mysqli_fetch_array($result)) :
                ?>
                    <option class="text-center" value="<?php echo $korisnik['id']; ?>"><?php echo $korisnik['username']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="btn_sacuvaj_recept" class="btn btn-primary">Sačuvaj recept</button>
    </form>

    <?php
    require 'Recept.php';

    if (isset($_POST['btn_sacuvaj_recept'])) {

        $recept = new Recept();
        if ($recept->sacuvajNoviRecept($_POST['naslov'], $_POST['kraci_opis'], $_POST['tekst'], $_POST['kategorija'], $_POST['korisnik'])) {
            header('Location: index.php');
        } else {
            echo 'Greska!';
        }
    }

    ?>

</body>

</html>