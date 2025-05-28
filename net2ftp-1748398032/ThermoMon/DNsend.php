<!DOCTYPE HTML>  
<html>
<body>  

<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

$Ti_Valid = array(true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true);
$Ti = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$Ti_text = array("T0","T1","T2","T3","T4","T5","T6","T7","T8","T9","T10","T11","T12","T13","T14","T15");
$Ti_Err = array("","","","","","","","","","","","","","","","");
$comma = ",";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["sid"])) {
     $IDErr = "ID is required";
  }
  else {
    $ID = test_input($_POST["sid"]);
    // check if name only contains letters and whitespace
     $pattern = '/^[0-9]{4}$/';
     if (!preg_match($pattern,$sid)) {
       $IDErr = "just 4 digit allowed"; 
     }
  }
     
  for ($x = 0; $x <= 15; $x++) {
    if (empty($_POST[$Ti_text[$x]])) {
          $Ti[$x] = 0;
          $Ti_Valid[$x] = false;
    } 

    else {
      $Ti[$x] = test_input($_POST[$Ti_text[$x]]);
      if (!filter_var($Ti[$x],FILTER_VALIDATE_FLOAT)){
         $Ti_Err[$x]= $Ti_text. " must be a number, "; 
      }
    }
  echo $Ti_Err[$x];

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
   
$sql = "INSERT INTO `ND` (`Date`,";

for ($x = 0; $x <= 15; $x++) {
  if($Ti_Valid[$x] == true){
    $sql .= $Ti_text[$x] ;
    $sql .= ",";
  }
}

$sql .= "`ID`)";
$sql .= " VALUES (\"$TimeStamp\",";

for ($x = 0; $x <= 15; $x++) {
  if($Ti_Valid[$x] == true){
    $sql .=  (string) $Ti[$x].",";
    
  }
}

$sql .= "\"$ID\")";

//echo $sql;
        
$result = $conn->query($sql);

if ($result === TRUE) {
  echo 'Record updated successfully';
} 
else {
  echo 'Error updating record: ' . $conn->error;
}
$conn->close();

?>