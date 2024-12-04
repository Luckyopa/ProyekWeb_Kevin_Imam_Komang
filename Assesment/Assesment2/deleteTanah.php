<?php
include "dbConfig.php";

$nohp = $_GET["nohp"];

$sqlStatement = "SELECT * FROM uploadtanah WHERE nohp='$nohp'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

$sqlStatement = "DELETE FROM uploadtanah WHERE nohp='$nohp'";
$query = mysqli_query($conn, $sqlStatement);
if ($query) {
    unlink("../images/" . $row["foto"]);
    $succesMsg = "Penghapusan data  " . $nama . " berhasil";
    header("location:tampilData.php?successMsg=$succesMsg");
}

mysqli_close($conn);
