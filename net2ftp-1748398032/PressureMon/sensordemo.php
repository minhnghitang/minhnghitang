<html>
<head>
  <link rel = "stylesheet" href="/PressureMon/cellphone.css">
<title>Demo</title>
</head>
<body>
  <h1>DEMO</h1>
  <form action="/PressureMon/sensordemo.php" method="post"> 
    <p><label>Entry ID :</label></p>
    <p><input type="text" name="eid"  
       value='<?php if(isset($_POST['eid']) && $_POST['eid'] != NULL){$eid=$_POST['eid']; echo $eid;} ?>'></p>
    
    <p><label>Sensor ID :</label></p>
    <p><input type="text" name="sid"  
       value='<?php if(isset($_POST['sid']) && $_POST['sid'] != NULL){$sid=$_POST['sid']; echo $sid;} ?>'></p>

    <p><label>From :</label></p>
    <p><input type="datetime-local" name="frdate"  
       value='<?php if(isset($_POST['frdate']) && $_POST['frdate'] != NULL){$frdate=$_POST['frdate']; echo $frdate;} ?>'></p>

    <p><label>To :</label></p>
    <p><input type="datetime-local" name="todate"  
       value='<?php if(isset($_POST['todate']) && $_POST['todate'] != NULL){$todate=$_POST['todate']; echo $todate;} ?>'></p>

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
        $sql="SELECT * FROM `PM` WHERE `sid` = '" . $sid . "' AND `frDate` = '" . $frdate . "'";

        $result=$conn->query($sql);
      
        if($result->num_rows > 0){ echo "<p>Data exist!</p>";}
        else{
           $sql = "INSERT INTO `PM` (`sid`, `frDate`, `toDate`) VALUES ('" . $sid . "','";
           $sql .= $frdate . "','" . $todate . "')";
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