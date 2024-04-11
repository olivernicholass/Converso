
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fanpit | Login</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
    <link rel="stylesheet" type="text/css" href="../css/media.css">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="../images/fanpit-no-bg.png" class="fanpit-logo" />
        </div>
        <form action="login.php" method="POST">
            <div class="backdrop">
                <div class="login-header">
                    <h1>Login</h1>
                </div>
 
                <div class="login-box">

                    <div class="input-field">
                        <input type="text" name="username" id="user" class="input-box" placeholder="" required />
                        <label for="user" class="label-user">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="pass" class="input-box" placeholder="" required />
                        <label for="pass" class="label-pass">Password</label>
                    </div>
                    <div class="remember-forgot">
                        <div class="remember-me">
                            <label for="remember">Remember me</label>
                            <input type="checkbox" name="remember" class="remember" />
                        </div>
                        <div class="forgot-password">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-box">
                        <input type="submit" value="Login" name="submit" />
                    </div>
                    <div class="register">
                        <span>Don't have an account? <a href="register.php">Register</a> or <a href="index.php">Return Home</a></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
    session_start();
    //$connection = mysqli_connect("localhost", "root", "", "fanpit", 3306);
    require "connect.php";
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: index.php");
        exit;
    }

    $field_err = "";
    $login_err = "";
    $user = $_POST["username"];
    $pass = $_POST["password"];
    if (isset($user) && isset($pass)) {

        $sql = "SELECT * FROM user WHERE username = ?";
        $prep_stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($prep_stmt, "s", $user);
        mysqli_stmt_execute($prep_stmt);
        $result = mysqli_stmt_get_result($prep_stmt);

        // $check = mysqli_query($connection, "SELECT * FROM user WHERE username = '".$user."'");
        // $rows = mysqli_num_rows($check);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $db_user = $row["username"];
                $db_pass = $row["pass"];
                if ($user == $db_user && $pass == $db_pass) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["nickname"] = $row["nickname"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["birthday"] = $row["birthday"];
                    $_SESSION["username"] = $user;
                    $_SESSION["password"] = $pass;

                    header("Location: index.php");
                    exit;
                } else {
                    $login_err = "Invalid username or password";
                }
            } else {
                $login_err = "Invalid username or password";
            }
        } else {
            $login_err = "Invalid username or password.";
        }
    }

    if ($login_err) {
        echo '<div class="login-error">';
        echo '<p>' . $login_err . '</p>';
        echo '</div>';
    }

    mysqli_stmt_close($prep_stmt);
    mysqli_close($connection);
}
?>