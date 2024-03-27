<?php
require 'connect.php';

$userid = 0;
$threadid = @$_POST['threadid'];
$content = @$_POST['content'];
$parent_postid = @$_POST['parent_postid'];
if(isset($_POST['submit'])){
    echo $title . ", " . $content;

    //create post object second - use threadid in post object..
    $sql = "INSERT INTO post (threadid, userid, content, parent_postid) VALUES (?,?,?,?);";
    $prep_stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($prep_stmt, "iisi", $threadid, $userid, $content, $parent_postid);


    if (mysqli_stmt_execute($prep_stmt)) {
        echo "Data inserted successfully.";
        header("Location: index.php");
        //header("Location: thread.php/?thread_id=" . $threadid);
    } else if(!mysqli_stmt_execute($prep_stmt) && mysqli_stmt_execute($prep_stmt)){
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }else if(mysqli_stmt_execute($prep_stmt1) && !mysqli_stmt_execute($prep_stmt)){
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}