<?php


$vrednost = $_POST['vrednost'];


$query = "select r.id, r.naslov, r.kraci_opis, r.tekst, r.kategorija, k.username from recept r join korisnik k on r.korisnik_id=k.id 
        where r.id like '%" . $vrednost . "%' or r.naslov like '%" . $vrednost . "%' or r.kraci_opis like '%" . $vrednost . "%' or r.tekst like '%" . $vrednost . "%' or r.kategorija like '%" . $vrednost . "%' or k.username like '%" . $vrednost . "%'";
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "recepti";
$connection = new mysqli($hostname, $username, $password, $dbname);

$result = $connection->query($query);

while ($recept = mysqli_fetch_array($result)) {
?>

    <tr class="text-center">
        <td><?php echo $recept['id']; ?></td>
        <td><?php echo $recept['naslov'];  ?></td>
        <td><?php echo $recept['kraci_opis'];  ?></td>
        <td><?php echo $recept['tekst'];  ?></td>
        <td><?php echo $recept['kategorija']; ?></td>
        <td><?php echo $recept['username']; ?></td>
    </tr>

<?php
}
?>