<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>    
<body>  


<?php

//echo "request method: ". $_SERVER["REQUEST_METHOD"]."<br>";
   
//echo "ID request:".$_REQUEST['ID']."<br>";
//echo "ID post :".$_POST["ID"]."<br>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["ID"])) {
     $IDErr = "ID is required";
  }
  else {
    $ID = test_input($_POST["ID"]);
    // check if name only contains letters and whitespace
     $pattern = '/^[0-9]{4}$/';
     if (!preg_match($pattern,$ID)) {
       $IDErr = "just 4 digit allowed"; 
     }
   }
     
     
   
  	if (empty($_POST["T0"])) {
          $T0 = 0;
       } 

       else {
          $T0 = test_input($_POST["T0"]);
          if (!filter_var($T0,FILTER_VALIDATE_FLOAT)){
          $T0Err= "must be a number"; 
        }
     } 
     
     if (empty($_POST["T1"])) {
          $T1 = 0;
       } 

       else {
          $T1 = test_input($_POST["T1"]);
          if (!filter_var($T1,FILTER_VALIDATE_FLOAT)){
          $T1Err= "must be a number"; 
        }
     } 
     
     if (empty($_POST["T2"])) {
          $T2 = 0;
       } 

       else {
          $T2 = test_input($_POST["T2"]);
          if (!filter_var($T2,FILTER_VALIDATE_FLOAT)){
          $T2Err= "must be a number"; 
        }
     } 
     
     if (empty($_POST["T3"])) {
          $T3 = 0;
       } 

       else {
          $T3 = test_input($_POST["T3"]);
          if (!filter_var($T3,FILTER_VALIDATE_FLOAT)){
          $T3Err= "must be a number"; 
        }
     } 
     
   	if (empty($_POST["T4"])) {
          $T4 = 0;
       } 

       else {
          $T4 = test_input($_POST["T4"]);
          if (!filter_var($T4,FILTER_VALIDATE_INT)){
          $T4Err= "must be a number"; 
        }
     } 
     
     if (empty($_POST["T5"])) {
          $T5 = 0;
       } 

       else {
          $T5 = test_input($_POST["T5"]);
          if (!filter_var($T5,FILTER_VALIDATE_INT)){
          $T5Err= "must be a number"; 
        }
     } 
     
     if (empty($_POST["T6"])) {
          $T6 = 0;
       } 

       else {
          $T6 = test_input($_POST["T6"]);
          if (!filter_var($T6,FILTER_VALIDATE_INT)){
          $T6Err= "must be a number"; 
        }
     } 
     
     if (empty($_POST["T7"])) {
          $T7 = 0;
       } 

       else {
          $T7 = test_input($_POST["T7"]);
          if (!filter_var($T7,FILTER_VALIDATE_INT)){
          $T7Err= "must be a number"; 
        }
     } 

if (empty($_POST["T8"])) {
          $T8 = 0;
       } 

       else {
          $T8 = test_input($_POST["T8"]);
          if (!filter_var($T8,FILTER_VALIDATE_INT)){
          $T8Err= "must be a number"; 
        }
     } 

if (empty($_POST["T9"])) {
          $T9 = 0;
       } 

       else {
          $T9 = test_input($_POST["T9"]);
          if (!filter_var($T9,FILTER_VALIDATE_INT)){
          $T9Err= "must be a number"; 
        }
     } 

    
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$t=time();
$TimeStamp=date("Y-m-d H:i:s",$t);
echo $TimeStamp;
?>

<h2>PHP Form Data Input</h2>
<p><span class="error">* required field</span></p>

	<form method="post">  
  	
  T0: <input type="text" name="T0" value="<?php echo $T0;?>">
  <span class="error"><?php echo $T0Err;?></span>
  <br><br>
  	
    
  T1: <input type="text" name="T1" value="<?php echo $T1;?>">
  <span class="error"><?php echo $T1Err;?></span>
  <br><br>
  	
      T2: <input type="text" name="T2" value="<?php echo $T2;?>">
  <span class="error"><?php echo $T2Err;?></span>
  <br><br>
  	
      T3: <input type="text" name="T3" value="<?php echo $T3;?>">
  <span class="error"><?php echo $T3Err;?></span>
  <br><br>
  	
    
  	  T4: <input type="text" name="T4" value="<?php echo $T4;?>">
  <span class="error"><?php echo $T4Err;?></span>
  <br><br>
  	
    
     T5: <input type="text" name="T5" value="<?php echo $T5;?>">
  <span class="error"><?php echo $T5Err;?></span>
  <br><br>
  	
      T6: <input type="text" name="T6" value="<?php echo $T6;?>">
  <span class="error"><?php echo $T6Err;?></span>
  <br><br>
  	
      T7: <input type="text" name="T7" value="<?php echo $T7;?>">
  <span class="error"><?php echo $T7Err;?></span>
  <br><br>
  	
      T8: <input type="text" name="T8" value="<?php echo $T8;?>">
  <span class="error"><?php echo $T8Err;?></span>
  <br><br>
  	
      T9: <input type="text" name="T9" value="<?php echo $T9;?>">
  <span class="error"><?php echo $T9Err;?></span>
  <br><br>
  	
      ID: <input type="text" name="ID" value="<?php echo $ID;?>">
  <span class="error"><?php echo $IDErr;?></span>
  <br><br>
  	
    
  <input type="submit" name="submit" value="Submit">  
</form>


<?php
echo "<h3>Your Input:</h3>";
echo "ID: ";
echo $ID;
echo "<br>";
echo $IDErr;
echo "<br>";

echo "T0: ";
echo $T0;
echo "<br>";
echo $T0Err;
echo "<br>";

echo "T1: ";
echo $T1;
echo "<br>";
echo $T1Err;
echo "<br>";

echo "T2: ";
echo $T2;
echo "<br>";
echo $T2Err;
echo "<br>";

echo "T3: ";
echo $T3;
echo "<br>";
echo $T3Err;
echo "<br>";

echo "T4: ";
echo $T4;
echo "<br>";
echo $T4Err;
echo "<br>";

echo "T5: ";
echo $T5;
echo "<br>";
echo $T5Err;
echo "<br>";

echo "T6: ";
echo $T6;
echo "<br>";
echo $T6Err;
echo "<br>";

echo "T7: ";
echo $T7;
echo "<br>";
echo $T7Err;
echo "<br>";

echo "T8: ";
echo $T8;
echo "<br>";
echo $T8Err;
echo "<br>";

echo "T9: ";
echo $T9;
echo "<br>";
echo $T9Err;
echo "<br>";


?>

<?php
echo "<br>";
$servername = "localhost";
$username = "25684";
$password = "nghievn123";
$dbname = "25684";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   
   //$sql = "SELECT * FROM `ND` WHERE  `ID`=\"$ID\"";
 // echo $sql;
   //$result = $conn->query($sql);

   // if ($result->num_rows == 0) {
    	$sql = "INSERT INTO `ND` (`T0`,`T1`,`T2`,`T3`,`T4`,`T5`,";
        $sql .= "`T6`,`T7`,`T8`,`T9`,`ID`)";
        $sql .= " VALUES ($T0,$T1,$T2,$T3,$T4,$T5,";
        $sql .= "$T6,$T7,$T8,$T9,\"0001\")";
        echo $sql;
        $result = $conn->query($sql);

         if ($result === TRUE) {
              echo "Record updated successfully";
          } 
          else {
               echo "Error updating record: " . $conn->error;
           }
   // }

$conn->close();
?>

</body>
</html>
