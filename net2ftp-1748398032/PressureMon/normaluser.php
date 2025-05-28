<html>
<head>
<title>Monitoring</title>
  <link rel = "stylesheet" href="/PressureMon/cellphone.css">
</head>
<body>
  <h1>WORK TIME REPORT</h1>
  <?php
    $fp = fopen("Sum.csv", "r");
    $row = fgetcsv($fp,0,",");
    fclose($fp);
  ?> 
    <p>Total :<b> <?php echo $row[0];     ?></b></p>
    <p><br>Daily :</p>
    <p><t><t>Today :<b> <?php echo $row[1];    ?></b></p>
    <p><t>Today-1 :<b> <?php echo $row[2];   ?></b></p>
    <p><t>Today-2 :<b> <?php echo $row[3];   ?></b></p>
    <p><t>Today-3 :<b> <?php echo $row[4];   ?></b></p>
    <p><t>Today-4 :<b> <?php echo $row[5];   ?></b></p>  
    <p><a href = "/PressureMon">RETURN ROOT</a></p>
</body>
</html>	