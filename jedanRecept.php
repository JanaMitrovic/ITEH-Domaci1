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

    $query = "select r.id, r.naslov, r.kraci_opis, r.tekst, r.kategorija, k.username from recept r join korisnik k on r.korisnik_id=k.id where r.id=" . $_GET['id'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "recepti";
    $connection = new mysqli($hostname, $username, $password, $dbname) or die("Connect failed: %s\n" . $connection->error);
    $result = $connection->query($query);

    $recept = mysqli_fetch_object($result);

    ?>

    <div class="container">

        <h1 class="text-center" id="naslov-recept" style="margin-top: 20px; margin-bottom: 15px;"><?php echo $recept->naslov; ?></h1>

        <div class="text">
            <?php echo $recept->tekst; ?>
        </div>

        <a href="izmena.php?id=<?php echo $recept->id; ?>"><button type="button" class="btn btn-primary" id="button_izmeni">Izmeni</button></a>




    </div>
</body>

</html>