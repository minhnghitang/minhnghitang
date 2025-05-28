<!DOCTYPE HTML>  
<html>
<body>  

<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

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
?>

	<form method="post">  
  	<input type="text" name="T0"><br>
  	<input type="text" name="T1"><br>
 	<input type="text" name="T2"><br>
 	<input type="text" name="T3"><br>
 	<input type="text" name="T4"><br>
 	<input type="text" name="T5"><br>
 	<input type="text" name="T6"><br>
 	<input type="text" name="T7"><br>
  	<input type="text" name="T8"><br>
  <input type="text" name="T9"><br>
  <input type="text" name="ID"><br>
  <input type="submit" name="submit">  
</form>

<?php
echo "<br>";
$servername = "localhost";
$username = "1410048";
$password = "covid19end";
$dbname = "1410048";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   
   //$sql = "SELECT * FROM `ND` WHERE  `ID`=\"$ID\"";
   // echo $sql;
   //$result = $conn->query($sql);

    //if ($result->num_rows == 0) {
    	$sql = "INSERT INTO `ND` (`Date`,`T0`,`T1`,`T2`,`T3`,`T4`,`T5`,";
        $sql .= "`T6`,`T7`,`T8`,`T9`,`ID`)";
        $sql .= " VALUES (\"$TimeStamp\",$T0,$T1,$T2,$T3,$T4,$T5,";
        $sql .= "$T6,$T7,$T8,$T9,\"$ID\")";
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
