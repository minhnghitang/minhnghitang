<?php
  #if(isset($_POST['uid']) && $_POST['uid'] != NULL){
    $Uid = $_POST['uid'];
    
    switch ($Uid){
      case "eQ4lniClON3CjWhByutmCfpVywTt74kP0v" :
        include 'sensordemo.php';
        break;
      
      case "4iOCjWbbWhtmCfpVTtP0vN3C74klnlywByueQ" :
        include 'normaluser.php' ;
        break;
      
     case "dq9sJjv7A57a2eH67Ce079a2f1L5Fc7E65" :
        include 'sensorwrite.php';
        break;

      case "ABjx4n4NZb7EDF5FnDK31BKo2WiSy8Z8vOhhS8ovvo" :
        include 'adminuser.php';
        break;

      default:
        include 'invalid.php';
        break;
    }
?>
		