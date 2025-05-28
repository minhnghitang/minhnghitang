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
<form method="post" action="normaluser.php">  
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
	$line= array("STT","SID","DATE","TIME");
    array_push($line,"C0","C1","C2","C3");
    fputcsv($myfile,$line);
   echo "<br>New CSV : "; 
   echo "<a href='output.csv' download> ";
   echo "download output file </a><br>";
   
   fclose($myfile);
   
}

//$ccStr = "CONCAT('20',`Year`,'-',`Month`,'-',`Day`,' ',`Hour`,':',`Minute`,':00')";

if (!empty($_POST["frDate"])) {
   if (!empty($_POST["toDate"])){
     $whereStr = "WHERE `Date` BETWEEN '".$_POST["frDate"]."' AND '".$_POST["toDate"]."'";
   }
   
   else {
     $whereStr="WHERE `Date` >= '" . $_POST["frDate"] . "'";
   }
}

else {

   if (!empty($_POST["toDate"])){
     $whereStr="WHERE `Date` <= '".$_POST["toDate"]."'";
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

$sql = "SELECT `sid`,`Curr0`,`Curr1`,`Curr2`,`Curr3`, ";
$sql .= " CONCAT('20',`Year`,'-',`Month`,'-',`Day`) AS `Date` ,";
$sql .= " CONCAT(`Hour`,':',`Minute`,':00') AS `Time` ";
$sql .= " FROM `LVLoad` ". $whereStr ;
$sql .= " ORDER BY `Date` DESC,`Time` DESC ";

//echo "<br>".$sql."<br>";
$result = $conn->query($sql);
$myfile=fopen("output.csv","w");
$line= array("STT","SID","DATE","TIME");
array_push($line,"C0","C1","C2","C3");
fputcsv($myfile,$line);


if ($result->num_rows > 0) {
    // output data of each row
    $Stt=1;
    while($row = $result->fetch_assoc()) {    
        $line=array($Stt,"'" . $row["sid"]);
        array_push($line,$row["Date"],$row["Time"]);
        array_push($line,$row["Curr0"],$row["Curr1"]);
        array_push($line,$row["Curr2"],$row["Curr3"]);

        fputcsv($myfile,$line);
        $Stt++;
    }
    
}

$results_per_page = 30;
$number_of_result = $result->num_rows;
$number_of_page = ceil($number_of_result/$results_per_page);

if($_GET["page"]==null){
  $page = 1;
}
else{
  $page = $_GET["page"];
}

$page_first_result = ($page-1)*$results_per_page;

$sql1 = "SELECT `sid`,`Curr0`,`Curr1`,`Curr2`,`Curr3`, ";
$sql1 .= " CONCAT('20',`Year`,'-',`Month`,'-',`Day`) AS `Date` ,";
$sql1 .= " CONCAT(`Hour`,':',`Minute`,':00') AS `Time` ";
$sql1 .= " FROM `LVLoad` ". $whereStr ;
$sql1 .= " ORDER BY `Date` DESC,`Time` DESC ";
$sql1 .= "LIMIT " .$page_first_result.",".$results_per_page;

$result1 = $conn->query($sql1);

    echo " Date from ".$_POST["frDate"]. " to " .$_POST["toDate"] . " , ";
    echo " Display / total of record:  30/".$number_of_result;
    echo " , page No: ".$page;
if ($result1->num_rows > 0) {
    echo "<br><table style=\"width:100%\">  <tr> <th>STT</th> <th>ID</th> ";
    echo " <th>DATE</th> <th>TIME</th>   <th>N</th>  <th>A</th>  <th>B</th>  <th>C</th> ";
    
    // output data of each row
    $Stt=1;
    while($row = $result1->fetch_assoc()) {    
        $line=array($Stt,$row["sid"]);
        array_push($line,$row["Date"],$row["Time"]);
        array_push($line,$row["Curr0"],$row["Curr1"]);
        array_push($line,$row["Curr2"],$row["Curr3"]);

        //fputcsv($myfile,$line);
        
        if($Stt<=$results_per_page){
            echo "<tr> <td>"  . $Stt. " </td><td> " . $row["sid"]. " </td><td> ";
            echo $row["Date"]. "</td><td> ". $row["Time"]. "</td><td> " ;
            echo $row["Curr0"]. " </td><td> " . $row["Curr1"]. " </td><td> ";
            echo $row["Curr2"]. " </td><td> " . $row["Curr3"]. " </td><td> "; 
        }
        $Stt++;
    }
    echo "</table>";
  
  for($page=1;$page<=$number_of_page;$page++){
    echo '<a href="normaluser.php?page='.$page.'">'.$page.' </a>';
  }
   
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
	