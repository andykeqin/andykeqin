<html>
<head>
<Title>Search Form</Title>
<style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>
<h2>Search here!</h2>
<p>Fill in the <strong>Name</strong> which you want to search, then click <strong>Search</strong> to list it.</p>
<form method="post" action="index1.php" enctype="multipart/form-data" >
      Search by Name <input type="text" name="name" id="name"/></br>
      <input type="submit" name="search" value="Search" />
</form>
<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "eu-cdbr-azure-west-b.cloudapp.net";
    $user = "b2963b49d8c94f";
    $pwd = "da3b4d2b";
    $db = "andykeqin";
    // Connect to database.
    try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        die(var_dump($e));
    }
        
    // Insert registration info
    if(!empty($_POST)) {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = date("Y-m-d");
        $company = $_POST['company'];
        
    }
    catch(Exception $e) {
        die(var_dump($e));
    }
    }
        
    // Retrieve data
    $sql_select = "SELECT * FROM registration_tbl0 WHERE name LIKE concat('%',?,'%')";
    $stmt = $conn->prepare($sql_select);
    $stmt->bindValue(1, $name);
    $stmt->execute();
    $registrants = $stmt->fetchAll();
    if(count($registrants) >0 ) {
        echo "<h2>Result:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Date</th>";
        echo "<th>Company</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['name']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['date']."</td>";
            echo "<td>".$registrant['company']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is searched！</h3>";
    }
?>
</body>
</html>
