<?php
   echo "sensor on writing!\n";
   $uid="";
   $sid="";
   $Year="";
   $Month="";
   $Day="";
   $Hour="";
   $Minute="";

   
   if(isset($_POST['sid']) && $_POST['sid'] != NULL){$sid=$_POST['sid'];}
   if(isset($_POST['Year']) && $_POST['Year'] != NULL){$Year=$_POST['Year'];}
   if(isset($_POST['Month']) && $_POST['Month'] != NULL){$Month=$_POST['Month'];}
   if(isset($_POST['Day']) && $_POST['Day'] != NULL){$Day=$_POST['Day'];}
   if(isset($_POST['Hour']) && $_POST['Hour'] != NULL){$Hour=$_POST['Hour'];}
   if(isset($_POST['Minute']) && $_POST['Minute'] != NULL){$Minute=$_POST['Minute'];}
   if(isset($_POST['Curr0']) && $_POST['Curr0'] != NULL){$Curr0=$_POST['Curr0'];}
   if(isset($_POST['Curr1']) && $_POST['Curr1'] != NULL){$Curr1=$_POST['Curr1'];}
   if(isset($_POST['Curr2']) && $_POST['Curr2'] != NULL){$Curr2=$_POST['Curr2'];}
   if(isset($_POST['Curr3']) && $_POST['Curr3'] != NULL){$Curr3=$_POST['Curr3'];}

   if(isset($_POST['uid'])){
     if($_POST['uid'] != NULL){
       $uid=$_POST['uid'];
       if($uid == "dq9sJjv7A57a2eH67Ce079a2f1L5Fc7E65"){
         echo "\r\nBB\r\nUID OK!\r\nEE\r\n";
         $servername="localhost";
         $username="1410048";
         $password="covid19end";
         $dbname="1410048";
         $conn=new mysqli($servername,$username,$password,$dbname);

         if($conn->connect_error){die("Connection failed: ". $conn->connect_error);}
         $sql="SELECT * FROM `LVLoad` WHERE `sid` = '" . $sid . "' AND `Year` = '" . $Year . "'";
         $sql .= " AND `Month` = '" . $Month . "' AND `Day` = '" . $Day . "'";
         $sql .= " AND `Hour` = '" . $Hour . "' AND `Minute` = '" . $Minute . "'";

         $result=$conn->query($sql);
      
         if($result->num_rows > 0){ echo "Data exist!\n";}
         else{
           $sql = "INSERT INTO `LVLoad` (`sid`, `Year`, `Month`, `Day`, `Hour`, `Minute`, ";
           $sql .= "`Curr0`, `Curr1`, `Curr2`, `Curr3`) VALUES ('" . $sid . "','";
           $sql .= $Year . "','" . $Month . "', '" . $Day . "', '" . $Hour . "','" . $Minute . "', ";
           $sql .= $Curr0 . ", " . $Curr1 . ", " . $Curr2 . ", " . $Curr3 . ")";

           $result = $conn->query($sql);
           if($result === True){ echo "Update successfully!\n";}
           else{ echo "Update fail!\n";} 
         }

         $conn->close();
       }
       else{ echo "Entry ID wrong!\n";}
     }
     else{ echo "Entry ID is NULL!\n";}
   }
   else{echo "No Entry ID!\n";}

?>

		