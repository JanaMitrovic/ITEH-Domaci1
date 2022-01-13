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

    <div class="container">

        <h2 class="text-center" style="margin-top:15px;">Pretraga i sortiranje</h2>
        <input type="text" id="pretrazi-polje" placeholder="Unesi vrednost za pretragu...">
        <div id="tabela-sort">
        </div>

        <table class="table table-bordered" id="tabela" style="margin-top: 40px;">
            <thead>
                <tr class="text-center">
                    <th id="id" value="asc">ID</th>
                    <th id="naslov" value="asc">Naslov</th>
                    <th id="kraci_opis" value="asc">Kraći opis</th>
                    <th id="tekst" value="asc">Tekst</th>
                    <th id="kategorija" value="asc">Kategorija</th>
                    <th id="username" value="asc">Username</th>
                </tr>
            </thead>

            <tbody id="body-table">
                <?php

                $query = "select r.id, r.naslov, r.kraci_opis, r.tekst, r.kategorija, k.username from recept r join korisnik k on r.korisnik_id=k.id";
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "recepti";
                $conn = new mysqli($hostname, $username, $password, $dbname);
                $result = $conn->query($query);

                while ($recept = mysqli_fetch_array($result)) :
                ?>
                    <tr class="text-center">
                        <td><?php echo $recept['id']; ?></td>
                        <td><?php echo $recept['naslov'];  ?></td>
                        <td><?php echo $recept['kraci_opis'];  ?></td>
                        <td><?php echo $recept['tekst'];  ?></td>
                        <td><?php echo $recept['kategorija']; ?></td>
                        <td><?php echo $recept['username']; ?></td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>

</html>