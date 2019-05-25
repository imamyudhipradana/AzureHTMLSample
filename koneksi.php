// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:submisi.database.windows.net,1433; Database = blog_crud", "adminserver", "@dmin123456789");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "adminserver@submisi", "pwd" => "@dmin123456789", "Database" => "blog_crud", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:submisi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
