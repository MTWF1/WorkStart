

<!DOCTYPE html>
<html>

<head>
    <title>Logowanie</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
    <h1>Logowanie</h1>

    <form method="post">
        <label for="rcp">RCP:</label>
        <input type="text" id="rcp" name="rcp" required><br>

        <label for="pass">Hasło:</label>
        <input type="password" id="pass" name="pass" required><br>

        <input type="submit" value="Zaloguj">
    </form>

    <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rcp = $_POST["rcp"];
    $pass = $_POST["pass"];

    // Dane bazy danych (jak wcześniej)
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zgloszenie";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    // Sprawdzenie czy dane logowania są poprawne
    $sql = "SELECT * FROM pracownicy WHERE RCP = '$rcp' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['rcp'] = $rcp;
        header("Location: index.php"); // Przekierowanie do strony rozpoczęcia pracy
        exit();
    } else {
        echo "Błędne dane logowania.";
    }

    $conn->close();
}
?>
</body>
</html>