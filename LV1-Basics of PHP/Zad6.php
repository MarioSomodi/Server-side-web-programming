<?php
    $predmeti = array(
        "Operacijski sustavi",
        "Mrežno programiranje (i)",
        "Integracija računala i telefonije (i)",
        "Upravljanje projektima (i)",
        "Vjerojatnost i statistika (i)",
        "Web programiranje na strani poslužitelja",
        "Skriptni programski jezici"
    );
    foreach($predmeti as $predmet){
        echo strlen($predmet)."<br>";
    }
?>