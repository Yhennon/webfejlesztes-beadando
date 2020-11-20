<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'cypher.php';
    error_reporting(0); 

    //nem egészen értem miért müködik úgy,hogy ott van a $_POST["password-area"] az && után,de nélküle nem működik.
    if (isset($_POST["username-area"]) && $_POST["username-area"] == true && isset($_POST["password-area"]) && $_POST["password-area"] == true) {
        $username = $_POST["username-area"];
        $password = $_POST["password-area"];
    } else if ($_POST["username-area"] == false && $_POST["password-area"] == false) {
        echo '<script>alert("You need to type in the username and the password first.")</script>';
    } else if ($_POST["password-area"] == false) {
        echo "You need to type in the password.";
    } else if ($_POST["username-area"] == false) {
        echo "You need to type in the username.";
    }

    // This connection only works on : https://beadando-lt.000webhostapp.com/ .
    // In the folder "sql-for-remote-use" tabla.sql can be found, which you can use on a localhost,
    // changing the connection to "mysqli("localhost", "root", "", "adatok");"
    $conn = new mysqli("localhost", "id15455765_root", "{g#HjpO=#E7@ac2&", "id15455765_localhost");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select Titkos from tabla
            where Username = '$username'";
    $result = $conn->query($sql);
    $color = $result->fetch_assoc();

    $colorarray = array("piros" => "#E84638", "zold" => "#00CC66","sarga" => "#EAFF6A", "kek" => "#B3C7D6FF","fekete" => "#4F4D49","feher" => "#FCF5E7");
    $favcolor = $colorarray[$color["Titkos"]];

    // katika@gmail.com*katica85
    $concatenation = (string) $username . '*' . $password;

    if ((strpos($asciidecoded, $concatenation) !== false) and (isset($username) && $username == true) and (isset($password) && $password == true)) {
        echo "A $username nevű felhasználó kedvenc színe: ";
        echo $color["Titkos"];
        echo '<br><br>';
        echo "<script>
                document.body.style.backgroundColor ='$favcolor'
              </script>";
    } else {
        if (stristr($asciidecoded, $username) == false) {
            echo '<script>alert("Nincs ilyen nevű felhasználó!")</script>';
        } else if (stristr($asciidecoded, $password) == false) {
            echo "<script>
                    alert('Nem megfelelő jelszó!');
                    setTimeout( window.location.replace('http://www.police.hu/'),3000 );
                 </script>";
        }
    }

    ?>
    <br>
    <button><a href="index.php">Vissza az előző oldalra!</a></button>


</body>

</html>