<?php

$column_id = $_POST['column_id'];
$sort = $_POST['sort'];

?>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th id="id" value="<?php
                                if ($sort == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                }
                                ?>">ID</th>
            <th id="naslov" value="<?php
                                    if ($sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    }
                                    ?>">Naslov</th>
            <th id="kraci_opis" value="<?php
                                        if ($sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                        ?>">Kraći opis</th>
            <th id="tekst" value="<?php
                                    if ($sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    }
                                    ?>">Tekst</th>
            <th id="kategorija" value="<?php
                                        if ($sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                        ?>">Kategorija</th>
            <th id="username" value="<?php
                                        if ($sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                        ?>">Username</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select r.id, r.naslov, r.kraci_opis, r.tekst, r.kategorija, k.username from recept r join korisnik k on r.korisnik_id=k.id order by " . $column_id . " " . $sort . "";
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "recepti";
        $conn = new mysqli($hostname, $username, $password, $dbname);

        $result = $conn->query($query);

        while ($red = mysqli_fetch_array($result)) :
        ?>
            <tr class="text-center">
                <td><?php echo $red['id']; ?></td>
                <td><?php echo $red['naslov'];  ?></td>
                <td><?php echo $red['kraci_opis'];  ?></td>
                <td><?php echo $red['tekst'];  ?></td>
                <td><?php echo $red['kategorija']; ?></td>
                <td><?php echo $red['username']; ?></td>
            </tr>

        <?php endwhile; ?>

    </tbody>

</table>