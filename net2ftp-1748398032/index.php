<http>
<head>
  <meta http-equiv="refresh" content="60">
  <style>
    table, th, td {  border: 1px solid black;  border-collapse: collapse;}
   </style>
</head>
<body>
  <h1>Select Mode :</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <label for="bien1"> Bien 1 :</label><t>
    <input type="text" id="bien1" name="bien1"  
       value='<?php if(isset($_POST['bien1']) && $_POST['bien1'] != NULL){ echo $_POST['bien1']; } ?>' ><br>
   
    <label for="bien2"> Bien 2 :</label><t>
    <input type="text" id="bien2" name="bien2"  
       value='<?php if(isset($_POST['bien2']) && $_POST['bien2'] != NULL){ echo $_POST['bien2']; } ?>' ><br>
    <input type="submit" name="submit" value="Submit">  
    <input type="submit" name="newCSV" value="New CSV">  
  </form>

  <?php
    if(!empty($_POST["newCSV"])){
	$myfile=fopen("output.csv","w");
	$line= array("ten bien 1","ten bien 2");  
        fputcsv($myfile,$line);  
        echo "<br>New CSV : ";   
        echo "<a href='output.csv' download> ";  
        echo "download output file </a><br>";    
    }

    
  ?>

 
</body>
</http>