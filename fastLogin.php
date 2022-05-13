<?php
    $err="";
    if($_POST){
        include 'php/db.php';
        $email=$_POST['email'];
        $query="SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['anything']='something';
            header('location:index.php');
        }else{  
            $err="Cet email n'éxiste pas";
            header('location:login.php?err='.$err);          
        }
    }
?>