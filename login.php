<?php
$title = "Login Page";
include_once "header.php";
?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Caht App</header>
            <form >
              <div class="error-txt"></div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>

                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
                <div class="link">No yet singed up?<a href="./loginup.html">Sing Up </a></div>
            </form>
        </section>
    </div>
    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/login.js"></script>

</body>
</html>