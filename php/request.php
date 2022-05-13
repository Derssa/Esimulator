<?php
$disponibility =$rent= $designation_number=$lot_number = $batiment_number ="";
$number=$tarif=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["disponibility"])) {
    $disponibility = test_input($_POST["disponibility"]);
  }
  
  if (!empty($_POST["lot-number"])) {
    $lot_number = test_input($_POST["lot-number"]);
  }
    
  if (!empty($_POST["batiment-number"])) {
    $batiment_number = test_input($_POST["batiment-number"]);
  }

  if (!empty($_POST["designation-number"])) {
    $designation_number = test_input($_POST["designation-number"]);
  }

  if (!empty($_POST["number"])) {
    $number = test_input($_POST["number"]);
  }

  if (!empty($_POST["rent-type"])) {
    $rent = test_input($_POST["rent-type"]);
  }
}

if($disponibility=='terrains'){
$sql = "SELECT * FROM terrains WHERE numero_lot='$lot_number'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $lot_number=$row["numero_lot"];
    $surface=$row["surface"];
    $tarif=$row["tarif"];
    $charge=$row["charge"];
  }
} else {
  null;
}
}
if($disponibility=='batiment'){
  $sql = "SELECT * FROM batiments WHERE numero_batiment='$batiment_number'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $batiment_number=$row["numero_batiment"];
      $surface_rdc=$row["surface_rdc"];
      $surface_etage=$row["surface_etage"];
      $parking=$row["parking"];
      $tarif=$row["tarif"];
      $charge=$row["charge"];
    }
  } else {
    null;
  }
  }

  if($disponibility=='commerce'){
    $sql = "SELECT * FROM commerces WHERE designation= '$designation_number'";
    $result = $conn->query($sql);
    if($result){
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $designation_number=$row["designation"];
        $surface=$row["surface"];
        $tarif=$row["tarif"];
        $charge=$row["charge"];
      }
    } else {
      null;
    }
  }
  }
  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>