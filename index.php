<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="form singup">
            <header>Realtime Caht App</header>
            <form  action="#" enctype="multipart/form-data">
              <div class="error-txt"></div>
                <div class="name-datails">
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>

                </div>

                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to chat">
                </div>
                <div class="link">Alredy singed up?<a href="login.php">Login </a></div>
            </form>
        </section>
    </div>
    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/singup.js"></script>

</body>
</html>