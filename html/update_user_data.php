<?php  
require "connect.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $user = $_SESSION["username"]; // Assuming username is unique

    // Fetch data for the logged-in user
    $query = "SELECT * FROM user WHERE username = '$user'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        
        // Set session variables
        $_SESSION["nickname"] = $user_data["nickname"];
        $_SESSION["email"] = $user_data["email"];
        $_SESSION["birthday"] = $user_data["birthday"];
        $_SESSION["userid"] = $user_data["userid"];
        // No need to set $_SESSION["username"] and $_SESSION["password"] again
        // as they're already set during the login process
    }
}
?>