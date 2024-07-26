<?php
global $conn;
session_start();
include "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)){//login orqali kelgan malumotlarni db dagi userning malumotlari bilan solishtirish email va password
    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if(mysqli_num_rows($sql) > 0){//agar malutotlar tog'ri bo'lsa
        $row = mysqli_fetch_assoc($sql);//shu malumotlarni asasativni arrayga otkazish
        $_SESSION['unique_id'] = $row['unique_id'];// va shu holatda userni unique_id sini belgilash
        echo "success";

    }else{
        echo "Email or Password is incorrect!";
    }
}else{
    echo "All input fields are required!";
}

?>