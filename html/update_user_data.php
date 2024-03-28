<?php 
        session_start(); 
        $connection = mysqli_connect("localhost", "root", "", "fanpit", 3306);
        require "connect.php";
        $getall = mysqli_query($connection, "SELECT * FROM user");
        while($all = mysqli_fetch_assoc($getall)) {
            $_SESSION["nickname"] = $all["nickname"];
            $_SESSION["email"] = $all["email"];
            $_SESSION["birthday"] = $all["birthday"];
            $_SESSION["username"] = $all["username"];;
            $_SESSION["password"] = $all["pass"];
            $_SESSION["userid"] = $all["userid"];
        }
    
    ?>