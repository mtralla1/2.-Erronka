<?php
    session_start();
//if(isset($_POST['submit'])){
    $posta = $_POST['posta'];
    $pasahitza = $_POST['pasahitza'];

    $servername = "localhost:33066";
    $username = "root";
    $password = "";
    $database = "txirrindularitza";

    $conn = new mysqli($servername, $username, $password, $database);


    $login_balidatu = mysqli_query($conn, "SELECT * FROM datuak where posta = '" . $posta . "' AND pasahitza = '" . $pasahitza . "'");

    if(mysqli_num_rows($login_balidatu) > 0) {
        
       $_SESSION['erabiltzaile'] = $posta;
        header("location: denda.php");
       // exit;
    } else {
       
        echo '
            <script>
                alert("Ez dago erabiltzailea edo pasahitza okerra");
                window.location = "../login.html";
            </script>
        ';
        exit;
    }

    $conn->close();
//}

