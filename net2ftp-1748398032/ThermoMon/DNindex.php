<html>
<head>
<meta http-equiv="refresh" content="60">

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<h1>Select Mode :</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label for="frDate"> Từ ngày :</label><t>
  <input type="date" id="frDate" name="frDate"><t>
  <label for="toDate"> Đến ngày :</label><t>
  <input type="date" id="toDate" name="toDate"><br>
  <input type="submit" name="submit" value="Submit">  
  <input type="submit" name="newCSV" value="New CSV">  
</form>
<h2><?php 
          //echo "frDate :".$_POST["frDate"]."<br>";
          //echo "toDate :".$_POST["toDate"]."<br>";

      ?>

</h2>


<?php

if(!empty($_POST["newCSV"])){
	$myfile=fopen("output.csv","w");
	$line= array("STT","ID","TEN","DC","DATE","T0","T1");
    array_push($line,"T2","T3","T4","T5","T6","T7","T8","T9");
    fputcsv($myfile,$line);
   echo "<br>New CSV : "; 
   echo "<a href='output.csv' download> ";
   echo "download output file </a><br>";
   
   fclose($myfile);
   
}

if (!empty($_POST["frDate"])) {
   if (!empty($_POST["toDate"])){
     $whereStr="WHERE Date BETWEEN \"".$_POST["frDate"]."\" AND  \"".$_POST["toDate"]."\"";
   }
   
   else {
     $whereStr="WHERE Date >= \"".$_POST["frDate"]."\"";
   }
}

else {

   if (!empty($_POST["toDate"])){
     $whereStr="WHERE Date <= \"".$_POST["toDate"]."\"";
   }
   else {
     $whereStr="";
   }

}
   //echo $whereStr."<br>";

?>

<h3>MONITORING TABLE</h3>


<?php
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



$sql = "SELECT * FROM VIEW_ND ". $whereStr. " ORDER BY Date DESC ";
//echo $sql."<br>";
$result = $conn->query($sql);
    echo " from date '".$_POST["frDate"]. "' to date '".$_POST["toDate"]."' , ";
    echo " Display / total of record:  30/";
    echo $result->num_rows;
if ($result->num_rows > 0) {
	echo "<br><table style=\"width:100%\">  <tr> <th>STT</th> <th>ID</th> ";
    echo " <th>TEN</th> <th>DIA CHI</th> ";
    echo " <th>DATE</th>  <th>T0</th>  <th>T1</th>  ";
    echo "<th>T2</th>  <th>T3</th> <th>T4</th><th>T5</th>";
    echo " <th>T6</th>   <th>T7</th> <th>T8</th> <th>T9</th></tr>";

    
    // output data of each row
    $Stt=1;
    while($row = $result->fetch_assoc()) {    
        $line=array($Stt,$row["ID"]);
        array_push($line,$row["Ten"],$row["DiaChi"],$row["Date"]);
        array_push($line,$row["T0"],$row["T1"]);
        array_push($line,$row["T2"],$row["T3"]);
        array_push($line,$row["T4"],$row["T5"]);
        array_push($line,$row["T6"],$row["T7"]);
         array_push($line,$row["T8"],$row["T9"]);
        //fputcsv($myfile,$line);
        
        if($Stt<=30){
            echo "<tr> <td>"  . $Stt. " </td><td> " . $row["ID"]. " </td><td> " .$row["Ten"];
            echo " </td><td> " .  $row["DiaChi"]. " </td><td> " . $row["Date"]. "</td><td> " ;
            echo $row["T0"]. " </td><td> " . $row["T1"]. " </td><td> ";
            echo $row["T2"]. " </td><td> " . $row["T3"]. " </td><td> ";
            echo $row["T4"]. " </td><td> " . $row["T5"]. " </td><td> ";
            echo $row["T6"]. " </td><td> " . $row["T7"]. " </td><td> "; 
            echo $row["T8"]. " </td><td> " . $row["T9"]. "</tr>"; 
        }
        $Stt++;
    }
    echo "</table>";
    
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
