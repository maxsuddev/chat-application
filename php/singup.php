<?php
global $conn;
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);// mysqli_real_escape_string() bu function frontendan kelgan malumottlarni tozalab dbga mosalab yozadi
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){// datalarni bor yoqligini tekshirish
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){//emailni bor yoqligini tekshirish
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){//agar userning datasi bo'lsa quyidagi masseage yuboriladi
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['image'])){ //rasmni bor yoqligini tekshirish
                    $img_name = $_FILES['image']['name'];//fayl nomini olish
                    $img_type = $_FILES['image']['type']; //fayl turini olish
                    $tmp_name = $_FILES['image']['tmp_name']; //faylning vaqtinchalik saqlash name
                    
                    $img_explode = explode('.',$img_name); //faylni ajratish
                    $img_ext = end($img_explode); //faylni oxirini olish yani turini
    
                    $extensions = ["jpeg", "png", "jpg"]; // erro uchun array 
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];// ruxsat etilgan typlar 
                        if(in_array($img_type, $types) === true){ //yuklangan faylni turini tekshirish
                            $time = time();// bu uniqui time yuklangan imageni nomlashda ishlatamiz
                            $new_img_name = $time.$img_name; //yuklangan faylning nomini saqlash unique time bilan
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){//faylni o'z fayilimizga yuklash yani serverning vaqtinchalik yuklangan joydan olib $tmp_name dan olib imagesga saqlash
                                $ran_id = rand(time(), 100000000); //userga randomni unique timdan olib id berish biz uni tanishimiz uchun
                                $status = "Active now"; //sataus activ agar hammasi togri bolsa
                                //$passwordMd5 = md5($password); //passwordni heshlash
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')"); //databasega datalari insert qilish
                                if($insert_query){//agar malumotlar saqlansa 
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'"); //userdi email orqali topib 
                                    if(mysqli_num_rows($select_sql2) > 0){//va un false bolmasa 
                                        $result = mysqli_fetch_assoc($select_sql2); //olingan datani asosative arrayga o'tkizish 
                                        $_SESSION['unique_id'] = $result['unique_id'];// va shu holatda userni unique_id sini  yozish
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>