<?php

    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'cs';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    $id=isset($_GET['id'])?$_GET['id']:"";
    //Get image data from database
    $result = $db->query("SELECT * FROM ecs where id=$id");
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    
        //Render image
        header("Content-type: ".$row['mime']); 
        echo $row['img']; 
    }else{
        echo 'Image not found...';
    }

?>