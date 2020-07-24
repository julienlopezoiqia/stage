<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "mo2passe";
    $db = "oiqia_website";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


       $result = mysqli_query($conn,"SELECT created_at,email,nom,prenom,telephone,message FROM contact_form");
        while ($row = mysqli_fetch_array($result, 2)) {
            printf($row[0].'  '. $row[2].'   '. $row[3].'  '. $row[1]);
            echo '\n';
        }


$conn -> close();


?>