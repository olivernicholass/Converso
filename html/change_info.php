<?php
session_start();
if(isset($_SESSION["loggedin"])) {
    if($_SESSION["loggedin"] === true) {
        $connection = mysqli_connect("localhost", "root", "", "fanpit", 3306);
    
        $error = mysqli_connect_error();
        if($error != null)
        {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
        } else if($_SERVER["REQUEST_METHOD"] == "POST") {
            $curruser = $_SESSION["username"];
            #Check if changing username
            if(isset($_POST["username"])) {
                $user = $_POST["username"];
                $sql = "UPDATE user SET username = ? WHERE username = ?";
                if($prep_stmt = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($prep_stmt, "ss", $user, $curruser);
                    if(mysqli_stmt_execute($prep_stmt)) {
                        $_SESSION["username"] = $user;
                        header("location: edit-profile.php");
                    } else {
                        echo "An error occured while attempting to change your username. Please try again later.";
                    }
                }
            }
    
            #Check if changing nickname
            if(isset($_POST["nickname"])) {
                $nickname = $_POST["nickname"];
                $sql = "UPDATE user SET nickname = ? WHERE username = ?";
                if($prep_stmt = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($prep_stmt, "ss", $nickname, $curruser);
                    if(mysqli_stmt_execute($prep_stmt)) {
                        header("location: edit-profile.php");
                    } else {
                        echo "An error occured while attempting to change your nickname. Please try again later.";
                    }
                }
            }
            #Check if changing email
            if(isset($_POST["email"])) {
                $email = $_POST["email"];
                $sql = "UPDATE user SET email = ? WHERE username = ?";
                if($prep_stmt = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($prep_stmt, "ss", $email, $curruser);
                    if(mysqli_stmt_execute($prep_stmt)) {
                        header("location: edit-profile.php");
                    } else {
                        echo "An error occured while attempting to change your email. Please try again later.";
                    }
                }
            }
            #Check if changing picture
            if(isset($_FILES["pfp"])) {
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["pfp"]["name"]);
                if (move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_dir.$_FILES["pfp"]['name'])) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["pfp"]["name"])). " has been uploaded.";
                    rename($target_file, $_SESSION["userid"]."pfp-".basename($_FILES["pfp"]["name"]));
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
            }
            #Check if changing password
            if(isset($_POST["oldpassword"])) {
                $oldpass = $_POST["oldpassword"];
                $newpass = $_POST["newpassword"];
                $renewpass = $_POST["confirmnewpassword"];
                $sql = "UPDATE user SET pass = ? WHERE username = ?";

                if($prep_stmt = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($prep_stmt, "ss", $newpass, $curruser);
                    if(mysqli_stmt_execute($prep_stmt)) {
                        header("location: edit-profile.php");
                    } else {
                        echo "An error occured while attempting to change your password. Please try again later.";
                    }
                }
            }
    
        } else if($_SERVER["REQUEST_METHOD"] == "GET") {
            #
        } else {
            echo "No request method identified.";
        }
        mysqli_close($connection);
    } else {
        echo "you are not logged in.";
        header("location: login.php");
    }
} else {
    header("location: login.php");
    exit;
}
?>