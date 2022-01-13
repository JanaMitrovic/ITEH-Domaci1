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

    <h1 class="text-center mt-3">Kolačići.rs</h1>
    <div class="row row-cols-3 row-cols-md-3 g-3">

        <?php
        $query = "select r.id, r.naslov, r.kraci_opis, r.tekst, r.kategorija, k.username from recept r join korisnik k on r.korisnik_id=k.id";
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "recepti";
        $connection = new mysqli($hostname, $username, $password, $dbname) or die("Connect failed: %s\n" . $connection->error);
        $result = $connection->query($query);

        while ($recept = mysqli_fetch_array($result)) :
        ?>
            <div class="col">

                <div class="card h-100">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBDkWsh_abnQZRK_Vt1I_0GMUBaoBcYGjvwXjPZU6YYK24KonKImXF5pKTMfA6uHd1f1Y&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title text-center mt-1 mb-3"><?php echo $recept['naslov']; ?></h2>
                        <p class="card-text"><?php echo $recept['kraci_opis']; ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="jedanRecept.php?id=<?php echo $recept['id']; ?>"><button class="btn btn-primary">Otvori</button></a>
                        <button class="btn btn-danger">Obriši</button>

                    </div>
                    <div class="card-footer">
                        <!--<small class="text-muted">Last updated 3 mins ago</small>-->
                        <p class="card-text"><small class="text-muted">Dodao:</small> <?php echo $recept['username']; ?></p>

                    </div>
                </div>
            </div>


        <?php endwhile; ?>






    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>