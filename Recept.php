<?php

class Recept
{
    public $id;
    public $naslov;
    public $kraci_opis;
    public $tekst;
    public $kategorija;
    public $korisnik_id;


    public function sacuvajIzmene($id, $naslov, $kraci_opis, $tekst, $kategorija, $korisnik_id)
    {
        $conn = new mysqli("localhost", "root", "", "recepti");
        $upit = "update recept set naslov='" . $naslov . "', kraci_opis='" . $kraci_opis . "',
        tekst='" . $tekst . "', kategorija='" . $kategorija . "', korisnik_id='" . $korisnik_id . "' where id=" . $id;

        return $conn->query($upit);
    }
}
