<html>
<head>
<title>Invalid</title>
  <link rel = "stylesheet" href="/LVLoadMon/cellphone.css">

</head>
<body>
  <h1>HOME</h1>
  <form action="Entry.php" method="post"> 
    <p><label>User ID :</label></p>
    <p><input type="text" name="uid"  
       value='<?php if(isset($_POST['uid']) && $_POST['uid'] != NULL){ echo $_POST['uid']; } ?>' ></p>
    <p><input type="submit" name="submit" value="Submit"></p>    
  </form>
  <p><b>Invalid User ID!</b></p>
</body>
</html>	