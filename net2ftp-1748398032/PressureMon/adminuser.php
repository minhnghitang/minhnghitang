<html>
<head>
<title>Query</title>
  <link rel = "stylesheet" href="/PressureMon/cellphone.css">
</head>
<body>
  <h1>QUERY</h1>
  
<form action="/PressureMon/adminuser.php" method="post"> 
    
    <p><label>Sensor ID :</label></p>
    <p><input type="text" name="qid"  
       value='<?php if(isset($_POST['qid']) && $_POST['qid'] != NULL){$qid=$_POST['qid']; echo $qid;} ?>'></p>

    <p><label>From :</label></p>
    <p><input type="datetime-local" name="qfrdate"  
       value='<?php if(isset($_POST['qfrdate']) && $_POST['qfrdate'] != NULL){$qfrdate=$_POST['qfrdate']; echo $qfrdate;} ?>'></p>

    <p><label>To :</label></p>
    <p><input type="datetime-local" name="qtodate"  
       value='<?php if(isset($_POST['qtodate']) && $_POST['qtodate'] != NULL){$qtodate=$_POST['qtodate']; echo $qtodate;} ?>'></p>

    <p><input type="submit" name="submit" value="Submit"></p>    
  </form>
 
  <?php

        $whclause=="";
        if($qid != NULL){ $whclause .= " `sid` = '" . $qid . "'";}
        else{ $whclause .= " TRUE ";}

        $whclause .= " AND ";
        if($qfrdate != NULL){ $whclause .= " `frDate` >= '" . $qfrdate . "'";}
        else{ $whclause .= " TRUE ";}

        $whclause .= " AND ";
        if($qtodate != NULL){ $whclause .= " `toDate` <= '" . $qtodate . "'" ;}
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