<!DOCTYPE html>
<html>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "laravel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Ma'lumotlar bazsi bilan bog'lanishda xatolik yuz berdi");
    }

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<br>Category name-<br>";
        foreach ($result as $row) {
            echo  $row['name'].'<br>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

</body>

</html>