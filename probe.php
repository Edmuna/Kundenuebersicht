<?php



$newDocument = fopen("users.csv", "r");
    $counter = 0;
    while(($row = fgetcsv($newDocument)) !== false) {
        if($counter === 0) {
            $counter++;
            continue;
        }

        if($row[3] === "Active") {
            $arrData [] = $row;
        }
    }

    foreach ($arrData as $singleRow) {
        echo "Name is " . $singleRow[1] . " . Email is: " . $singleRow[2] . " and the user is " . $singleRow[3] . "<br/>";
        
    }
    
    fclose($newDocument);


    $doc = fopen("p2b.kunden.csv", "r");
    while(($row = fgetcsv($doc)) !== false) {
        $data [] = $row;
    };