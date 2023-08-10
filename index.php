<!DOCTYPE html>
<html>
<head>
    <title>Rozpoczęcie pracy</title>
        <link rel="stylesheet" href="styl.css">
</head>
<body>
    <h1>Rozpoczęcie pracy</h1>

    <?php
    session_start();

    // Dane bazy danych
    $host = "localhost"; 
    $username = "root";  
    $password = "";  
    $dbname = "zgloszenie"; 

    // Tworzenie połączenia z bazą danych
    $conn = new mysqli($host, $username, $password, $dbname);

    // Sprawdzenie czy udało się połączyć z bazą danych
    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }
    // Pobierz aktualną datę i godzinę
    $currentDateTime = date("Y-m-d H:i:s");
    // Sprawdzenie czy użytkownik jest zalogowany
    if (!isset($_SESSION['rcp'])) {
        header("Location: logowanie.php"); // Przekierowanie do strony logowania
        exit();
    }

    // Obsługa formularza rozpoczęcia pracy
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rcp = $_SESSION['rcp'];
        $numer = $_POST['numer'];

        // Sprawdzenie, czy numer jest poprawny (1, 2, 3, 4)
        if ($numer >= 1 && $numer <= 4) 
        //Przesłanie zgłoszenia do bazy
        {
            $sql = "INSERT INTO zgloszenia (currentDateTime, rcp, numer) VALUES ('$currentDateTime', '$rcp', '$numer')";
            if ($conn->query($sql) === TRUE) {
                echo "Rozpoczęto pracę: Numer $numer Data i godzina rozpoczęcia: $currentDateTime";
            } else {
                echo "Błąd: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Niepoprawny numer.";
        }
    }

    // Pobierz dane pracownika z bazy

    $rcp = $_SESSION['rcp'];
    $sql = "SELECT * FROM pracownicy WHERE RCP = '$rcp'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    
    // Wyświetl formularz
    echo "<div class='container'>";
    echo "<p>Witaj, " . $row['imie'] . " " . $row['nazwisko'] . "!</p>";
    echo "<form method='post'>";
    echo "<label for='numer'>Wybierz numer:</label>";
    echo "<select id='numer' name='numer'>";
    echo "<option value='1'>1</option>";
    echo "<option value='2'>2</option>";
    echo "<option value='3'>3</option>";
    echo "<option value='4'>4</option>";
    echo "</select>";
    echo "<br>";
    echo "<input type='submit' value='Rozpocznij'>";
    echo "</form>";
    echo "</div>";

    // Zamknięcie połączenia z bazą danych
    $conn->close();
    ?>

</body>
</html>