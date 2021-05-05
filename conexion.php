<?php
   $instancia = "mysql:host=localhost; dbname=controlventas";
   $user = "root";
   $pass = "rootroot";

    try{
        $con = new PDO ($instancia, $user, $pass);
        //echo 'Conectado POD';
    } catch (PDOException $e) {
        print "¡Error!: " .$e->getMessage()."<br/>";
        die();
    }
?>
