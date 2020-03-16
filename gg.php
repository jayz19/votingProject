<?php
if(isset($_POST["submit"])){
   // $check = getimagesize($_FILES["myfile"]["tmp_name"]);
   $check=true;
    if($check !== false){
        $image = $_FILES['myfile']['tmp_name'];
        $type=$_FILES['myfile']['type'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'cs';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into ecs (img, created, mime) VALUES ('$imgContent', '$dataTime','$type')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<body>

    <form method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="myfile" id="myfile"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
    <p></p>


    
    <?php
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'cs';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    // Check connection
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }

    $result = $db->query("SELECT * FROM ecs where DATEDIFF(CURRENT_TIMESTAMP,created)<15 ");
    
   
    ?>
        <table style=" font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
        <tr>
          <th>ID</th>
          
        </tr>
       <?php while($row=$result->fetch_assoc()){?>
        <tr>
          
          <td style=" border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo "<a target='_blank' href='view.php?id=".$row['id']."'>".$row['id']."</a>";?></td> 
          
        </tr>
        <?php
    }
   
    ?>
      </table>
       
    
    
    
</body>
</html>