<?php
$connect = mysqli_connect("localhost", "root", "", "myself");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
