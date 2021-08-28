<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svi studenti</title>
</head>
<body>
    <a href="index.php">Pocetna</a>
    <h1>Lista svih studenata</h1>
    <table>
        <thead>
            <th>Redni broj</th>
            <th>JMBAG</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Adresa</th>
            <th>Postanski broj</th>
            <th>Godina studija</th>
            <th>Ostvareni ECTS bodovi</th>
            <th>Prosjek Ocjena</th>
            <th>Naziv sobe</th>
        </thead>
        <tbody>
            <?php
                include 'helper.php';
                foreach($studenti as $key =>$student){
                    echo "
                    <tr>
                        <td>".($key+1)."</td>
                        <td>".$student->JMBAG."</td>
                        <td>".$student->ime."</td>
                        <td>".$student->prezime."</td>
                        <td>".$student->adresa."</td>
                        <td>".$student->postanskiBroj."</td>
                        <td>".$student->godinaStudija."</td>
                        <td>".$student->ostvareniECTSBodovi."</td>
                        <td>".$student->prosjekOcjena."</td>
                        <td>".$student->soba->naziv."</td>
                    </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>