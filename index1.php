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
<h1>Search here!</h1>
<p>Fill in the name which you want to search, then click <strong>Search</strong> to list it.</p>
<form method="post" action="index.php" enctype="multipart/form-data" >
      Name <input type="text" name="name" id="name"/></br>
      <input type="search" name="search" value="Search" />
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
        
    // Retrieve data
    mysql_select_db(registration_tbl0);
//切换到testdb
$query = "SELECT name,email,date,company FROM registration_tbl0";
。
$result = mysql_query($query);
//查询
while ($row = mysql_fetch_array($result)) { 
    echo "<p id="name">" , ($row['name']) , "</p><p id="uri">&ndash;" , nl2br($row['email'])
, "</p>"; }
//显示结果
mysql_free_result($result);
//释放结果
mysql_close();
</body>
</html>
