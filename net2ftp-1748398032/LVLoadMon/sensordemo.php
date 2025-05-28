<html>
<head>
  <link rel = "stylesheet" href="/LVLoadMon/cellphone.css">
<title>Demo</title>
</head>
<body>
  <h1>DEMO</h1>
  <form action="/LVLoadMon/sensordemo.php" method="post"> 
    <p><label>Entry ID :</label></p>
    <p><input type="text" name="eid"  
       value='<?php if(isset($_POST['eid']) && $_POST['eid'] != NULL){$eid=$_POST['eid']; echo $eid;} ?>'></p>
    
    <p><label>Sensor ID :</label></p>
    <p><input type="text" name="sid"  
       value='<?php if(isset($_POST['sid']) && $_POST['sid'] != NULL){$sid=$_POST['sid']; echo $sid;} ?>'></p>

    <p><label>Year :</label></p>
    <p><input type="text" name="Year"  
       value='<?php if(isset($_POST['Year']) && $_POST['Year'] != NULL){$Year=$_POST['Year']; echo $Year;} ?>'></p>

    <p><label>Month :</label></p>
    <p><input type="text" name="Month"  
       value='<?php if(isset($_POST['Month']) && $_POST['Month'] != NULL){$Month=$_POST['Month']; echo $Month;} ?>'></p>

    <p><label>Day :</label></p>
    <p><input type="text" name="Day"  
       value='<?php if(isset($_POST['Day']) && $_POST['Day'] != NULL){$Day=$_POST['Day']; echo $Day;} ?>'></p>

    <p><label>Hour :</label></p>
    <p><input type="text" name="Hour"  
       value='<?php if(isset($_POST['Hour']) && $_POST['Hour'] != NULL){$Hour=$_POST['Hour']; echo $Hour;} ?>'></p>

    <p><label>Minute :</label></p>
    <p><input type="text" name="Minute"  
       value='<?php if(isset($_POST['Minute']) && $_POST['Minute'] != NULL){$Minute=$_POST['Minute']; echo $Minute;} ?>'></p>

    <p><label>Curr0 :</label></p>
    <p><input type="text" name="Curr0"  
       value='<?php if(isset($_POST['Curr0']) && $_POST['Curr0'] != NULL){$Curr0=$_POST['Curr0']; echo $Curr0;} ?>'></p>

    <p><label>Curr1 :</label></p>
    <p><input type="text" name="Curr1"  
       value='<?php if(isset($_POST['Curr1']) && $_POST['Curr1'] != NULL){$Curr1=$_POST['Curr1']; echo $Curr1;} ?>'></p>

    <p><label>Curr2 :</label></p>
    <p><input type="text" name="Curr2"  
       value='<?php if(isset($_POST['Curr2']) && $_POST['Curr2'] != NULL){$Curr2=$_POST['Curr2']; echo $Curr2;} ?>'></p>

    <p><label>Curr3 :</label></p>
    <p><input type="text" name="Curr3"  
       value='<?php if(isset($_POST['Curr3']) && $_POST['Curr3'] != NULL){$Curr3=$_POST['Curr3']; echo $Curr3;} ?>'></p>


    <p><input type="submit" name="submit" value="Submit"></p>    
  </form>
 
  <?php
     if($eid == "7A57a284CeaFc7EB0fe1074cA6207985"){
        $servername="localhost";
        $username="1410048";
        $password="covid19end";
        $dbname="1410048";
        $conn=new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error){die("Connection failed: ". $conn->connect_error);}
        $sql="SELECT * FROM `LVLoad` WHERE `sid` = '" . $sid . "' AND `Year` = '" . $Year . "'";
        $sql .= " AND `Month` = '" . $Month . "' AND `Day` = '" . $Day ;
        $sql .= " AND `Hour` = '" . $Hour . "' AND `Minute` = '" . $Minute ;

        $result=$conn->query($sql);
      
        if($result->num_rows > 0){ echo "<p>Data exist!</p>";}
        else{
           $sql = "INSERT INTO `LVLoad` (`sid`, `Year`, `Month`, `Day`, `Hour` ,`Minute`, ";
           $sql .= "`Curr0`, `Curr1`, `Curr2`, `Curr3`)"; 
           $sql .= " VALUES ('" . $sid . "','" . $Year . "','" . $Month . "','" .$Day ."','";
           $sql .= $Hour . "','" . $Minute . "', " . $Curr0 . ", " . $Curr1 . ", ";
           $sql .= $Curr2 . ", " . $Curr3 . ")";
           echo "<p>" . $sql . "</p>";
           $result = $conn->query($sql);
           if($result === True){ echo "<p>Update successfully!<p>";}
           else{ echo "<p>Update fail!<p>";} 
        }

        $conn->close();
    }
    else{
       echo "<p>Entry ID wrong!</p>";
    }

  ?>

</body>
</html>		