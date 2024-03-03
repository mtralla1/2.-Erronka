<?php

    session_start();
    
    if(!isset($_SESSION['erabiltzaile'])){
        echo '
            <script>
                alert("Mesedez saioa hasi behar duzu");
            </script>
        ';
        header("location: ../login.html");
     
         session_destroy();
         die();
    } else {
        header("location: ./htmlPribatua/denda.html");
    }


