<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ind = $_POST["file"];

    $sql = "DELETE FROM `genuine_fakes_pictues` WHERE `genuine_fakes_pictues`.`gf_index` = ". $ind ."";
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "gfdatabase";
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

  header("Location: search.php");
