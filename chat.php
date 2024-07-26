<?php
global $conn;
session_start();
if(!isset($_SESSION['unique_id'])){//agar requst  unique_id bo'lmasa userni login pagiga jonatish
    header("location:login.php");
}
?>

<?php
$title = "Chat Page";
 include_once "header.php";
 ?>
 
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php
            include_once "./php/config.php";
            $user_id = mysqli_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");//db dan unique_idni foydalanuvchi idsi bilan tenglash
            if(mysqli_num_rows($sql) > 0){//agar dbdan malumot qaytsa 
                $row = mysqli_fetch_assoc($sql);//malumotni asosativ arrayga otkazish
            }
            ?>
                <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="./php/images/<?= $row['img'] ?>" alt="">
                    <div class="datails">
                        <span><?= $row['fname']. " " . $row['lname'] ?><</span>
                        <p><?= $row['status'] ?></p>
                    </div>
            </header>
          <div class="chat-box">
        
          
            </div>
            

         
          <form action="#" class="typing-area" autocomplete="off">
            <input type="hidden" name="outgoing_id" value="<?=  $_SESSION['unique_id']?>" > <!-- bu yerda hiddin inputi orqali jo'natuvchi ni unique_id sini jo'natyapmiz FROM -->
            <input type="hidden" name="incoming_id" value="<?=  $user_id ?>" >  <!-- bu yerda hiddin inputi orqali xabar oluvchi unique_id sini jo'natyapmiz TO -->
            <input type="text" name="message" class="input-filed" placeholder="message here ...">


            <button><i class="fab fa-telegram-plane"></i></button>
          </form>
        </section>
    </div>
    <script src="./javascript/chat.js"></script>
</body>
</html>