<?php
   echo "sensor on writing!\n";
   $eid="";
   $sid="";
   $frdate="";
   $todate="";

   
   if(isset($_POST['sid']) && $_POST['sid'] != NULL){$sid=$_POST['sid'];}
   if(isset($_POST['frdate']) && $_POST['frdate'] != NULL){$frdate=$_POST['frdate'];}
   if(isset($_POST['todate']) && $_POST['todate'] != NULL){$todate=$_POST['todate'];}

   if(isset($_POST['eid'])){
     if($_POST['eid'] != NULL){
       $eid=$_POST['eid'];
       if($eid == "fe107B04cA7A57a284Ce079a28Fc7E65"){
         echo "\r\nBB\r\nATIME=6000&AHIGHLEVEL=3000\r\nEE\r\n";
         $servername="localhost";
         $username="1410048";
         $password="covid19end";
         $dbname="1410048";
         $conn=new mysqli($servername,$username,$password,$dbname);

         if($conn->connect_error){die("Connection failed: ". $conn->connect_error);}
         $sql="SELECT * FROM `PM` WHERE `sid` = '" . $sid . "' AND `frDate` = '" . $frdate . "'";

         $result=$conn->query($sql);
      
         if($result->num_rows > 0){ echo "Data exist!\n";}
         else{
           $sql = "INSERT INTO `PM` (`sid`, `frDate`, `toDate`) VALUES ('" . $sid . "','";
           $sql .= $frdate . "','" . $todate . "')";
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

		