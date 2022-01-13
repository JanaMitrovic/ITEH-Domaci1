 <?php

    $upit = "delete from recept where id=" . $_GET['id'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "recepti";
    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->query($upit)) {
        header('Location: index.php');
    } else {
        echo 'Greska!';
    }
