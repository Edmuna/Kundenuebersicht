<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=woman" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=man" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>
  </head>
  <body>
    <h1>KUNDEN</h1>

    <?php
         $doc = fopen("p2b.kunden.csv", "r");
         while(($row = fgetcsv($doc, 1000, ";")) !== false) {
             $data [] = $row;
         };
    ?>

    <main>
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
foreach ($data as $singleEntry) {
    echo "<tr>";
    echo "<td>" . $singleEntry[0] . "</td>"; // Vorname
    echo "<td>" . $singleEntry[1] . "</td>"; // Nachname
    echo "<td>" . $singleEntry[2] . "</td>"; // E-Mail
    echo "<td>" . $singleEntry[3] . "</td>"; // Geschlecht
    echo "</tr>";
}

$maleCount = 0;
$femaleCount = 0;

foreach($data as $singleRow) {
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
<p>Gesamt: <?php print_r(count($data)) ?> </p>
<p> <span class="material-symbols-outlined">
man
</span>: <?php echo $maleCount ?> </p>
<span class="material-symbols-outlined">
woman
</span> <?php echo $femaleCount ?> </p>

</div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>