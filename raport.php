<!DOCTYPE html>
<html>
<head>
    <title>Raport</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<h1>Raport</h1>


<?php
//Dane bazy danych 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "zgloszenie";

$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT rcp, numer, currentDateTime FROM zgloszenia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>rcp: </tr></td>" . $row["rcp"]. " numer " . $row["numer"]. " Data" . $row["currentDateTime"]. "<br>";
    }
} else {
    echo "No results found";
}
$conn->close();
?>
</body>
</html>






