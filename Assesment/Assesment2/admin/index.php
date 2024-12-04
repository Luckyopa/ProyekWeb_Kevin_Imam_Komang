<?php
include "template/header.php";

if (isset($_SESSION['username'])) {
    echo "<h4>Selamat datang, " . $_SESSION['username'] . "</h4>";
}
?>

