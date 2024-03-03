<?php
function bilatuErrepikapena($email, $conn) {
    $sql = "SELECT * FROM `datuak` WHERE `posta` = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true; 
    } else {
        return false; 
    }
}

// if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pasahitza = $_POST['password'];


    $servername = "localhost:33066";
    $username = "root";
    $password = "";
    $database = "txirrindularitza";

    $conn = new mysqli($servername, $username, $password, $database);

   
    if (bilatuErrepikapena($email, $conn)) {
        echo '
                <script>
                    alert("Erabiltzaile hau erabilita dago");
                    window.location = "../register.html";
                </script>
            ';
    } else {
        
        $sql = "INSERT INTO `datuak` (`izena`, `abizena`, `posta`, `pasahitza`) 
                VALUES ('$name', '$surname', '$email', '$pasahitza')";
        if ($conn->query($sql) === TRUE) {
            echo '
            <script>
                alert("Erabiltzailea sortuta")
                window.location = "../login.html";
                
            </script>
            ';
        } else {
            echo '
                <script>
                    alert("Saiatu berriro, erabiltzailea ez lortua");
                    window.location = "../register.php";
                </script>
            ';
        }
    }

    $conn->close();


