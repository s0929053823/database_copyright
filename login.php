<?php include("navigation.php"); ?>

<?php
if (isLogin()) {
    header('location: index.php');
}
?>
    <!-- LOGIN FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo">Login</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post">
                <?php
                if (isset($_POST['login-button'])) {

                    $username = $_POST['lg_username'];
                    $password = $_POST['lg_password'];
                    if (empty($username) or empty($password)) {
                        echo "<label>Field Empty</label>";
                    } else {
                        $id = getMemberByAccountPassword($username, $password);
                        if ($id == null) {
                            echo "<label>Login Error</label>";
                        }
                        else {
                            $_SESSION['user_id'] = $id;
                            header('location: index.php');
                        }
                    }
                }
                ?>
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">Username</label>

                            <input type="text" class="form-control" id="lg_username" name="lg_username"
                                   placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="lg_password" name="lg_password"
                                   placeholder="password">
                        </div>
                    </div>
                    <button type="submit" class="login-button" name="login-button" value="login"><i
                                class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>new user? <a href="register.php">create new account</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

<?php include("footer.php"); ?>