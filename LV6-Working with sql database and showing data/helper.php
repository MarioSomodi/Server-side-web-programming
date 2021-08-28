<?php

include 'classes.php';
$studom = new Studom("", "");
$studom->GetStudents();
$studom->GetRooms();
$studentiJsonObj = json_decode($studom->studenti, true);
$roomsJsonObj = json_decode($studom->sobe, true);
$studenti = array();
$sobe = array();
foreach($studentiJsonObj as $student){
    $r;
    foreach($roomsJsonObj as $room){
        if($student['JMBAG'] == $room['JMBAG']){
            $r = new Soba(
                $room['Id'],
                $room['Kat'],
                $room['Naziv'],
                $room['Opis'],
                array()
            );
            array_push($sobe, $r);
        }
    }
    $s = new Student(
        $student['Ime'],
        $student['JMBAG'],
        $student['Prezime'],
        $student['Adresa'],
        $student['Grad'],
        $student['PostanskiBroj'],
        $student['GodinaStudija'],
        $student['OstvareniECTSBodovi'],
        $student['ProsjekOcjena'],
        null
    );
    $s->soba = $r;
    array_push($studenti, $s);
}
foreach($sobe as $soba){
    foreach($studenti as $student){
        if($student->soba->id == $soba->id)
        {
            array_push($student->soba->studenti, $student);
            array_push($soba->studenti, $student);
        }
    }
}

?>