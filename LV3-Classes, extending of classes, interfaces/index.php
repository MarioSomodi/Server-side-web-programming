<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LV3</title>
    </head>
    <body>
        <?php
            include "classes.php";
             $z1 = new Zaposlenik("Pero", "Peric", 19842084440);
            // $z2 = new Zaposlenik("Ivan", "Yokf", 1234567891);
            // $z3 = new Zaposlenik("Roko", "Eroid", 1234567892);
            // $z4 = new Zaposlenik();
            //echo 'Hello '.$z1->GetIme().' '.$z1->GetPrezime().' ('.$z1->GetOIB().')';
            echo $z1->Hello();
            // var_dump($z2);
            // var_dump($z3);
            // var_dump($z4);
            $n1 = new Nastavnik("Pero", "Ivdfu", 12132342234);
            $ss1 = new StrucnaSluzba("Duro", "Ivanic", 12132942234);
            $n1->Radi();
            $ss1->Radi();
            $p1 = new Predavac("Roko", "Eroid", 1234567892);
            $p1->DrziNastavu();
            $a1 = new Asistent("Ivan", "Yokf", 1234567891);
            $a1->DrziNastavu();
            $a1->PripremiNastavu();
            $a1->CuvajIspit();
        ?>
    </body>
</html>