<?php
require 'connect.php';

$section = 0;
$userid = 0;
$title = @$_POST['title'];
$content = @$_POST['content'];
$parent_postid = -1;
if(isset($_POST['submit'])){
    echo $title . ", " . $content;

    //create post object second - use threadid in post object..
    $sql = "INSERT INTO post (userid, title, content, parent_postid) VALUES (?,?,?,?);";
    $prep_stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($prep_stmt, "issi", $userid, $title, $content, $parent_postid);


    if (mysqli_stmt_execute($prep_stmt) && mysqli_stmt_execute($prep_stmt)) {
        echo "Data inserted successfully.";
        header("Location: index.html");
    } else if(!mysqli_stmt_execute($prep_stmt) && mysqli_stmt_execute($prep_stmt)){
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }else if(mysqli_stmt_execute($prep_stmt1) && !mysqli_stmt_execute($prep_stmt)){
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}