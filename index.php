<?php
    session_start();
    if(!$_SESSION['anything']){
        header('location:login.php');      
    }
    include 'php/db.php';
    include 'php/request.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/simulator.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="icon" href="public/icon-cfcim.png">
    <title>CFCIM Simulateur</title>
</head>
<body>


    <div class="app">
        <div class="header">
            <img src="public/logo-cfcim.png" alt="logo" />
        </div>
        <div class="body">
            <h2>Simulateur de prix</h2>
            <div class="section">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="select">
                      <?php
                      if($disponibility==""){
                        echo '<input type="checkbox" name="disponibility" id="terrains" value="terrains" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-6.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="batiment" value="batiment" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-5.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="commerce" value="commerce" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-7.jpg"/></div>';
                      }else if($disponibility=="terrains"){
                        echo '<input type="checkbox" name="disponibility" id="terrains" value="terrains" checked onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-6.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="batiment" value="batiment" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-5.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="commerce" value="commerce" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-7.jpg"/></div>';
                      }else if($disponibility=="batiment"){
                        echo '<input type="checkbox" name="disponibility" id="terrains" value="terrains" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-6.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="batiment" value="batiment" checked onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-5.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="commerce" value="commerce" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-7.jpg"/></div>';
                      }else if($disponibility=="commerce"){
                        echo '<input type="checkbox" name="disponibility" id="terrains" value="terrains" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-6.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="batiment" value="batiment" onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-5.jpg"/></div>
                        <input type="checkbox" name="disponibility" id="commerce" value="commerce" checked onclick="handleD(this.value)"/><div class="sec"><img class="img" src="public/Poste-7.jpg"/></div>';
                      }
                      ?>
                    
                    </div>
                    <select name="lot-number" disabled required>
                        <option value="">Choisissez le Lot</option>
                        <?php
                        $sql = "SELECT * FROM terrains WHERE disponibility=1";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              if($lot_number==$row['numero_lot']){
                              echo "<option selected value='".$row['numero_lot']."'>N° ".$row['numero_lot']."</option>";
                            }else{
                              echo "<option value='".$row['numero_lot']."'>N° ".$row['numero_lot']."</option>";
                            }
                            }
                          } else {
                            echo "";
                          }
                        ?>
                    </select>
                    <select name="batiment-number" style='display:none;' disabled required>
                        <option value="">Choisissez le Batiment</option>
                        <?php
                        $sql = "SELECT * FROM batiments WHERE disponibility=1";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              if($batiment_number==$row['numero_batiment']){
                                echo "<option selected value='".$row['numero_batiment']."'>N° ".$row['numero_batiment']."</option>";}
                              else{
                                echo "<option value='".$row['numero_batiment']."'>N° ".$row['numero_batiment']."</option>";
                              }
                            }
                          } else {
                            echo "";
                          }
                        ?>
                    </select>
                    <select name="designation-number" style='display:none;' disabled required>
                        <option value="">Choisissez la Designation</option>
                        <?php
                        $sql = "SELECT * FROM commerces WHERE disponibility=1";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              if($designation_number==$row['designation']){
                              echo "<option selected value='".$row['designation']."'>".$row['designation']."</option>";}
                              else{
                                echo "<option value='".$row['designation']."'>".$row['designation']."</option>";}
                              }
                          } else {
                            echo "";
                          };
                        ?>
                    </select>

                    <div>
                        <input
                        type="number"
                        name="number"
                        id="number"
                        min="0"
                        step="1"
                        placeholder="entrez jours"
                        value="<?php echo $number ?>"
                        required
                        />
                        <select name="rent-type" id="rent" onchange="handleT()">
                         <?php
                         if($rent=='jours' ||$rent==''){
                            echo '<option value="jours">Jours</option>
                            <option value="mois">Mois</option>
                            <option value="année">Année</option>';}
                            else if($rent=='mois'){
                              echo '<option value="jours">Jours</option>
                            <option selected value="mois">Mois</option>
                            <option value="année">Année</option>';
                            }
                            else if($rent=='année'){
                              echo '<option value="jours">Jours</option>
                            <option value="mois">Mois</option>
                            <option selected value="année">Année</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button id="sub" type="submit">Calculer le prix</button>
                    
                </form>
                <div class="result" id='result'>
                <?php
                if($tarif!=0){
                ?>
                  <h2 style="text-align:center;margin-bottom:10px">resultat:</h2>
                  <?php
                  if($disponibility=='terrains'){
                  ?>
                  <p style="color:black;">Info: ( Lot N°: <?php echo $lot_number ?>, Surface: <?php echo $surface ?> m² )</p>
                  <p>Tarif HT: <?php echo $tarif ?> MAD/ M²/ Mois</p>
                  <p style="margin-bottom:10px;">Charge HT: <?php echo number_format((float)$charge, 2, '.', ' '); ?> MAD/ M²/ Mois</p>
                  <?php
                  }else if($disponibility=='batiment'){
                    $surface=$surface_rdc+$surface_etage+$parking;
                  ?>
                  <p style="color:black;">Info: ( Batiment N°: <?php echo $batiment_number ?>, Surface-RDC: <?php echo $surface_rdc ?> m², Surface-étage: <?php echo $surface_etage ?> m², Parking: <?php echo $parking ?> m²)</p>
                  <p>Tarif HT: <?php echo $tarif ?> MAD/ M²/ Mois</p>
                  <p style="margin-bottom:10px;">Charge HT: <?php echo number_format((float)$charge, 2, '.', ' '); ?> MAD/ M²/ Mois</p>
                  <?php
                  }else if($disponibility=='commerce'){
                  ?>
                  <p style="color:black;">Info: ( Designation: <?php echo $designation_number ?>, Surface: <?php echo $surface ?> m²)</p>
                  <p>Tarif HT: <?php echo $tarif ?> MAD/ M²/ Mois</p>
                  <p style="margin-bottom:10px;">Charge HT: <?php echo number_format((float)$charge, 2, '.', ' '); ?> MAD/ M²/ Mois</p>
                  <?php
                  }
                  ?>
                  <?php
                  if($rent=='jours'){
                    $resultat=((($tarif/30)+($charge/30))*$surface)*$number;
                    echo "<span>Total HT: ".number_format((float)$resultat, 2, '.', ' ')." MAD</span>";
                    echo "<span>Total TTC: ".number_format((float)($resultat+($resultat*0.2)), 2, '.', ' ')." MAD</span>";
                  }
                  if($rent=='mois'){
                    $resultat=((($tarif)+($charge))*$surface)*$number;
                    echo "<span>Total HT: ".number_format((float)$resultat, 2, '.', ' ')." MAD</span>";
                    echo "<span>Total TTC: ".number_format((float)($resultat+($resultat*0.2)), 2, '.', ' ')." MAD</span>";
                  }
                  if($rent=='année'){
                    $resultat=((($tarif*12)+($charge*12))*$surface)*$number;
                    echo "<span>Total HT: ".number_format((float)$resultat, 2, '.', ' ')." MAD</span>";
                    echo "<span>Total TTC: ".number_format((float)($resultat+($resultat*0.2)), 2, '.', ' ')." MAD</span>";
                  }
                  ?>
                  <?php
                }else{
                ?>
                
                  <h2 style="text-align:center;color:#80808063;text-transform:uppercase;">le prix s'affiche ici</h2>
                <?php
                }              
                ?>
                </div>
            </div>
        </div>
    </div>
    <script>window.onload = function() {
      <?php
      if($disponibility==""){
                        echo 'handleD("")';
                      }else if($disponibility=="terrains"){
                        echo 'handleD("terrains")';
                      }else if($disponibility=="batiment"){
                        echo 'handleD("batiment")';
                      }else if($disponibility=="commerce"){
                        echo 'handleD("commerce")';
                      }
    ?>}</script>
    <script src="js/script.js"></script>
</body>
</html>