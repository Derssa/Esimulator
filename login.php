<?php
    if(isset($_GET['err'])){
        $err=$_GET['err'];
    }else{        
        $err="";
    }    
    if($_POST){
        include 'php/db.php';
        $nom=$_POST['nom'];        
        $prenom=$_POST['prenom'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $entreprise=$_POST['entreprise'];
        $query="SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['anything']='something';
            header('location:index.php');
        }else{
            $sql="INSERT INTO users (nom, prenom, tel,email,entreprise)
            VALUES ('$nom','$prenom','$tel','$email','$entreprise')";
            if (mysqli_query($conn,$sql)) {
                session_start();
                $_SESSION['anything']='something';
                header('location:index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
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
                <form method="POST">
                    <p id="con">connectez-vous au simulateur</p>                    
                    <input type="text" name="nom" id="nom" placeholder="Nom" required/>
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom" required/>
                    <input type="phone" name="tel" id="tel" placeholder="Numéro de Téléphone" required/>
                    <input type="email" name="email" id="email" placeholder="Email" required/>
                    <input type="entreprise" name="entreprise" id="entreprise" placeholder="Nom d'entreprise" required/>
                    <button type="submit">Accédez au simulateur</button>                   
                </form> 
                <form method="POST" action="fastLogin.php">                    
                    <p>*Si vous avez déja inséré vos informations, Entrez seulement votre Email</p>
                    <input type="email" name="email" id="email" placeholder="Email" onmousedown="delE()" required/>
                    <button type="submit" id="sub2">Accédez au simulateur</button>
                    <?php if($err){echo '<p id="errMsg">"'.$err.'"</p>';} ?>                    
                </form> 
            </div>
        </div>
        <script src="js/script.js"></script>
    <body>
</html>