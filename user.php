<?php
global $conn;
session_start();
if(!isset($_SESSION['unique_id'])){//agar requst  unique_id bo'lmasa userni login pagiga jonatish
    header("location:login.php");
    exit();
}
?>
<?php
$title = "User Page";
 include_once "header.php";
 ?>

<body>
<div class="wrapper">
    <section class="users">
        <header>
            <?php
            include_once "./php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");//db dan unique_idni foydalanuvchi idsi bilan tenglash
            if(mysqli_num_rows($sql) > 0){//agar dbdan malumot qaytsa 
                $row = mysqli_fetch_assoc($sql);//malumotni asosativ arrayga otkazish
            }
            ?>
            <div class="content">
                <img src="./php/images/<?= $row['img'] ?>" alt="">
                <div class="datails">
                    <span><?= $row['fname']. " " . $row['lname'] ?></span>  
                    <p><?= $row['status'] ?></p>
                </div>
            </div>
            <span class="logout"><a href="./login.html" >Logout</a></span>
        </header>
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to searche..">
            <button><i class="fas fa-search"></i></button>
        </div>

        <div class="users-list">
           
        </div>
    </section>
</div>
<script src="javascript/user.js"></script>

</body>
</html>