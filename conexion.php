<?php
   $instancia = "mysql:host=localhost; dbname=controlventas";
   $user = "root";
   $pass = "rootroot";

    try{
        $con = new PDO ($instancia, $user, $pass);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);      
        //echo 'Conectado POD';
    } catch (PDOException $e) {
        print "¡Error!: " .$e->getMessage()."<br/>";
        die();
    }
?>
