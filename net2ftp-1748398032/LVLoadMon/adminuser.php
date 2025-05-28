<html>
<head>
<title>Query</title>
  <link rel = "stylesheet" href="/LVLoadMon/cellphone.css">
</head>
<body>
  <h1>QUERY</h1>
  
<form action="/LVLoadMon/adminuser.php" method="post"> 
    
    <p><label>Sensor ID :</label></p>
    <p><input type="text" name="qid"  
       value='<?php if(isset($_POST['qid']) && $_POST['qid'] != NULL){$qid=$_POST['qid']; echo $qid;} ?>'></p>

    <p><label>Year :</label></p>
    <p><input type="text" name="Year"  
       value='<?php if(isset($_POST['Year']) && $_POST['Year'] != NULL){$Year=$_POST['Year']; echo $Year;} ?>'></p>

    <p><label>Month :</label></p>
    <p><input type="text" name="Month"  
       value='<?php if(isset($_POST['Month']) && $_POST['Month'] != NULL){$Month=$_POST['Month']; echo $Month;} ?>'></p>

    <p><label>Day :</label></p>
    <p><input type="text" name="Day"  
       value='<?php if(isset($_POST['Day']) && $_POST['Day'] != NULL){$Day=$_POST['Day']; echo $Day;} ?>'></p>
    

    <p><input type="submit" name="submit" value="Submit"></p>    
  </form>
 
  <?php

        $whclause=="";
        if($qid != NULL){ $whclause .= " `sid` = '" . $qid . "'";}
        else{ $whclause .= " TRUE ";}

        $whclause .= " AND ";
        if($Year != NULL){ $whclause .= " `Year` >= '" . $Year . "'";}
        else{ $whclause .= " TRUE ";}

        $whclause .= " AND ";
        if($Month != NULL){ $whclause .= " `Month` <= '" . $Month . "'" ;}
        else{ $whclause .= " TRUE ";}

        $whclause .= " AND ";
        if($Day != NULL){ $whclause .= " `Day` <= '" . $Day . "'" ;}
        else{ $whclause .= " TRUE ";}

        $servername="localhost";
        $username="1410048";
        $password="covid19end";
        $dbname="1410048";
        $conn=new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error){die("Connection failed: ". $conn->connect_error);}
        $sql="SELECT * FROM `PM` WHERE " . $whclause ;

        $result=$conn->query($sql);
      
        if($result->num_rows > 0){ 
           echo "<p>Output csv OK!</p>";
           $myfile=fopen("report.csv","w");
	   $line= array("ID","FROM","TO");
           fputcsv($myfile,$line);

           while($row = $result->fetch_assoc()) {    
              $line=array($Stt,$row["ID"]);
              fputcsv($myfile,$line);
           }
           fclose($myfile);
           
           echo "<a href='repord.csv' download> ";
           echo "DOWNLOAD REPORT</a><br>";
     

        }


        $conn->close();
  ?>
</body>
</html>		