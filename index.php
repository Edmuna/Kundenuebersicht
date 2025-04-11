<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- My own styles -->
    <link rel="stylesheet" href="style.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>KUNDENUEBERSICHT</title>
  </head>
  <body>
    <nav>
    <h1>KUNDEN</h1>
    </nav>

    <?php
         $doc = fopen("p2b.kunden.csv", "r");
         while(($row = fgetcsv($doc, 1000, ";")) !== false) {
             $data [] = $row;
         };
    ?>

    <main class="container">
    <div class="mb-3">
    <form method="get" class="form-inline">
    <label for="filter" class="mr-2">Filtern nach dem ersten Buchstaben des Nachnamens:</label>
    <select name="filter" id="filter" class="form-control mr-2">
      <option value="">-- All --</option>
      <?php 
        foreach (range('A', 'Z') as $letter) {
            $selected = ($_GET['filter'] ?? '') === $letter ? "selected" : "";
            echo "<option value=\"$letter\" $selected>$letter</option>";
        }
      ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
  </form>
</div>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Vorname</th>
      <th scope="col">Nachname</th>
      <th scope="col">E-Mail</th>
      <th scope="col">Geschlecht</th>
    </tr>
  </thead>
  <tbody>

<?php 

$filter = $_GET['filter'] ?? '';
$filteredData = [];

if ($filter !== '') {
    foreach ($data as $row) {
        if (strtoupper($row[1][0]) === strtoupper($filter)) {
            $filteredData[] = $row;
        }
    }
} else {
    $filteredData = $data;
}



foreach ($filteredData as $singleEntry) {
  echo "<tr>";
  echo "<td>" . $singleEntry[0] . "</td>";
  echo "<td>" . $singleEntry[1] . "</td>";
  echo "<td>" . $singleEntry[2] . "</td>";

  if ($singleEntry[3] == "Male") {
      echo "<td> <i class=\"fa-solid fa-person fa-2x\" style=\"color: #74C0FC;\"></i></td>";
  } elseif ($singleEntry[3] === "Female") {
      echo "<td> <i class=\"fa-solid fa-person fa-2x\" style=\"color: #ff0000;\"></i></td>";
  }

  echo "</tr>";
}



$maleCount = 0;
$femaleCount = 0;

foreach($filteredData as $singleRow) {
    $gender = strtolower(trim($singleRow[3])); 

    if ($gender === "male") {
        $maleCount++;
    } elseif ($gender === "female") {
        $femaleCount++;
    }
}

?>


</tbody>
</table>

<hr>
<div class="numbers">
<p>Gesamt: <?php echo count($filteredData); ?> </p>
<div class="icons">
<p> <i class="fa-solid fa-person fa-2x" style="color: #74C0FC;"></i> <?php echo $maleCount ?> </p>
<p> <i class="fa-solid fa-person fa-2x" style="color: #ff0000;"></i> <?php echo $femaleCount ?> </p>
</div>
</div>

    </main>
    <script src="https://kit.fontawesome.com/83677a6a4d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>