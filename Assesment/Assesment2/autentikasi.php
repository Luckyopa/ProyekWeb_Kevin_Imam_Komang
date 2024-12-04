<?php
include "dbConfig.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sqlstatement = "SELECT * FROM pendaftaran WHERE username = '$username'";
$query = mysqli_query($conn, $sqlstatement);
// echo $sqlstatement;
$data = mysqli_fetch_assoc($query);

// $data bisa berisi record sejumlah 0 (nol0 atau 1 (satu))

if($data == ""){
    echo "Username tidak terdaftar";
}else{
    //cek apakah passwor di form sama dengan di data base
    if(md5($password) == $data['password']){
        // echo"Login berhasil!";
        session_start();
        $_SESSION['username'] = $data['username'];
        // $_SESSION['loginStatus'] = TRUE;
        header("location:tampildata.php");
    }else{
        echo"Password salah!";
    }
}
?>