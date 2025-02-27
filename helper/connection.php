 <?php
 const SERVER='localhost';
 const DBNAME= 'sanaz';
 const DBUSER='root';
 const DBPASSWORD='';



 try{

     $option=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
     $connection = new PDO('mysql:host='.SERVER.';dbname='.DBNAME,DBUSER,DBPASSWORD,$option);
     //echo 'ok';
 }
 catch (PDOException $e){
     echo 'ERROR   : '.$e->getMessage();
     exit();
 }
?>