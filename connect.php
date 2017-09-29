 <?php   
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "test";  
 $message = "";  
 //V.
 try  
 {    
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
 }
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
?> 