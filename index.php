<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
// salvo dentro una variabile il voto cercato 
$voto =$_GET["voto"] ?? " ";

// salvo dentro una variabile se c'è un parcheggio  
$parcheggio = isset($_GET["parcheggio"]) &&
$_GET["parcheggio"] ?? "yes"   ;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- stampa senza grafica  -->
    <!-- <ul>
        <?php foreach ($hotels as $hotel) { ?>
            <li> <?php echo $hotel["name"] ?></li>
            <li> <?php echo $hotel["description"] ?></li>
            <li> <?php echo $hotel["parking"] ?></li>
            <li> <?php echo $hotel["vote"] ?></li>
            <li> <?php echo $hotel["distance_to_center"] ?></li>

        <?php } ?>
    </ul> -->

<!-- --------------------------------------------------------------------- -->



 <!-- stampa con tabella bootstrap -->

    <div class="container">
      
        <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <?php foreach ($hotels[0] as $key => $hotel) { ?>
      <th scope="col"><?php echo $key ?></th>
     
      <?php }?>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($hotels as $key => $hotel) { 
    $filteredHotels = !$voto || ($voto && str_contains(($hotel["vote"]),($voto)));
    $filteredParking = !$parcheggio || ($parcheggio && str_contains(($hotel["parking"]),($parcheggio)));
    if ( $filteredHotels &&  $filteredParking  ) {
       
  
        ?>
    <tr>
      <th scope="row"></th>
     
      <td><?php echo $hotel["name"] ?></td>
      <td><?php echo $hotel["description"] ?></td>
      <td><?php echo $hotel["parking"] ?></td>
      <td><?php echo $hotel["vote"] ?></td>
      <td><?php echo $hotel["distance_to_center"] ?></td>
  
    </tr>
    <?php   }}?>
  </tbody>
</table>
<form class="form-inline" action="">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"  name="voto">
    <option value=""></option>
    <option value="1">1 stella </option>
    <option value="2">2 stelle</option>
    <option value="3">3 stelle</option>
    <option value="4">4 stelle</option>
    <option value="5">5 stelle</option>
  </select>

  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline" value="yes" name="parcheggio">
    <label for="parcheggio" class="custom-control-label">Parcheggio ?</label>
  </div>

  <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>
    </div>
</body>

</html>