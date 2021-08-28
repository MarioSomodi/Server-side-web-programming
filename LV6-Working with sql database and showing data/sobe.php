<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobe</title>
</head>
<body>
    <a href="index.php">Pocetna</a>
    <h1>Prikaz svih soba</h1>
    <table>
        <thead>
            <th>Redni broj</th>
            <th>Naziv sobe</th>
            <th>Opis sobe</th>
            <th>Kat</th>
            <th>Studenti</th>
        </thead>
        <tbody>
            <?php
            
                include 'helper.php';
                foreach($sobe as $key=>$soba){
                    echo "
                        <tr>
                            <td>".($key+1)."</td>
                            <td>".$soba->naziv."</td>
                            <td>".$soba->opis."</td>
                            <td>".$soba->kat."</td>";
                    foreach($soba->studenti as $key=>$student){
                        echo "<td>".$student->ime." ".$student->prezime.", </td>";
                        if($key == 1){
                            break;
                        }
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>