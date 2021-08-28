<?php
class Configuration 
{
    public $host = "";
    public $dbName ="";
    public $username = "";
    public $password = "''";

    public function __construct($host, $dbName, $username, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }
    
}

class Soba{
    public $id = "";
    public $kat = "";
    public $naziv = "";
    public $opis = "";
    public $studenti = "";

    public function __construct($id, $kat, $naziv, $opis, $studenti){
        $this->id = $id;
        $this->kat = $kat;
        $this->naziv = $naziv;
        $this->opis = $opis;
        $this->studenti = $studenti;
    }
}

class Student{
    public $ime = "";
    public $JMBAG = "";
    public $prezime = "";
    public $adresa = "";
    public $postanskiBroj = "";
    public $grad = "";
    public $godinaStudija = "";
    public $ostvareniECTSBodovi = "";
    public $prosjekOcjena = "";
    public $soba = "";

    public function __construct($ime, $JMBAG, $prezime, $adresa, $postanskiBroj, $grad, $godinaStudija, $ostvareniECTSBodovi, $prosjekOcjena, $soba){
        $this->ime = $ime;
        $this->JMBAG = $JMBAG;
        $this->prezime = $prezime;
        $this->adresa = $adresa;
        $this->postanskiBroj = $postanskiBroj;
        $this->grad = $grad;
        $this->godinaStudija = $godinaStudija;
        $this->ostvareniECTSBodovi = $ostvareniECTSBodovi;
        $this->prosjekOcjena = $prosjekOcjena;
        $this->soba = $soba;
    }
}

class Studom{
    public $studenti = "";
    public $sobe = "";

    public function __construct($studenti, $sobe){
        $this->studenti = $studenti;
        $this->sobe = $sobe;
    }

    public function GetStudents(){
        include 'connection.php';
        $query = "SELECT
        studenti.JMBAG,
        studenti.Ime,
        studenti.Prezime,
        studentidodatnipodaci.Adresa,
        studentidodatnipodaci.PostanskiBroj,
        studentidodatnipodaci.Grad,
        studentipodacistudij.GodinaStudija,
        studentipodacistudij.OstvareniECTSBodovi,
        studentipodacistudij.ProsjekOcjena
    FROM studenti
    JOIN studentidodatnipodaci
      ON studenti.JMBAG = studentidodatnipodaci.JMBAG
    JOIN studentipodacistudij
      ON studentipodacistudij.JMBAG = studentidodatnipodaci.JMBAG";
        $oResult = $oConnection->query($query);
        $students = array();
        while($oRow = $oResult->fetch(PDO::FETCH_BOTH)){
            $students[] = $oRow;
        }
        $this->studenti = json_encode($students);
    }

    public function GetRooms(){
        include 'connection.php';
        $query = "SELECT
        sobe.Naziv,
        sobe.Opis,
        sobe.Kat,
        sobe.Id,
        studentsoba.JMBAG
    FROM sobe
    JOIN studentsoba
      ON sobe.Id = studentsoba.IdSobe";
        $oResult = $oConnection->query($query);
        $rooms = array();
        while($oRow = $oResult->fetch(PDO::FETCH_BOTH)){
            $rooms[] = $oRow;
        }
        $this->sobe = json_encode($rooms);
    }
}

?> 