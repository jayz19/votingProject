<!DOCTYPE html>
<html>
    <head>
    <title>Voting poll</title>
    <link rel="stylesheet" href="style.css"/>
    
    </head>
<body>
    <form action="index.php" method="post">
    <h1>Who is your favourite author?</h1>
    <label class="container">Miguel de Cervantes
  <input type="radio"  name="radio" value="mc">
  <span class="checkmark"></span>
    </label>
    <label class="container">Charles Dickens
  <input type="radio" name="radio" value="cd">
  <span class="checkmark"></span>
    </label>
    <label class="container">J.R.R. Tolkien
  <input type="radio" name="radio" value="jt">
  <span class="checkmark"></span>
    </label>
    <label class="container">Antoine de Saint-Exuper
  <input type="radio" name="radio" value="ae">
  <span class="checkmark"></span>
    </label>
    <input type="submit" name="submit" value="Submit" class="btn btn-success">
    </form>

  <?php
  $con= mysqli_connect("localhost","root","","voting");
  if(isset($_POST['submit']))
  {
    if(isset($_POST['radio']))
    { 
      $queryX="update vote set " . ($_POST['radio']) . "=" . ($_POST['radio']) . "+1";
      $run_mc=mysqli_query($con,$queryX);
      if($run_mc){
        echo "vote done for ",$_POST['radio'];
     }
    }
    else{echo "nothing selected";}
  }
  ?>  
</body>
</html>