
TEST
<?php

/*    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "8(5nmLkjWsb24?:8";
    $db = "oiqia_website";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
*/
include "CoBdd.php";
$conn= OpenCon();
       $result = mysqli_query($conn,"SELECT created_at,email,nom,prenom,telephone,message FROM contact_form");
        
$row1 = $result->fetch_array(MYSQLI_BOTH);
printf($row1[0].$row1[1]);
//while ($row = mysqli_fetch_array($result, 2)) {
//            printf($row[0].'  '. $row[2].'   '. $row[3].'  '. $row[1]);
//            echo '\n';
//        }


$conn -> close();


?>
