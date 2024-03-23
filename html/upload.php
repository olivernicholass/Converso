<?php
require 'connect.php';

$section = 0;
$userid = 0;
$title = @$_POST['title'];
$content = @$_POST['content'];
$parent_postid = -1;
if(isset($_POST['submit'])){
    echo $title . ", " . $content;

    //create thread object first.
    $sql1 = "INSERT INTO thread (sectionid, userid, title, content) VALUES (?,?,?,?);";
    $prep_stmt1 = mysqli_prepare($connection, $sql1);
    mysqli_stmt_bind_param($prep_stmt1, "iiss", $section, $userid, $title, $content);

    //create post object second - use threadid in post object..
    $sql2 = "INSERT INTO post (userid, title, content, parent_postid) VALUES (?,?,?,?);";
    $prep_stmt2 = mysqli_prepare($connection, $sql2);
    mysqli_stmt_bind_param($prep_stmt2, "issi", $userid, $title, $content, $parent_postid);


    if (mysqli_stmt_execute($prep_stmt1) && mysqli_stmt_execute($prep_stmt2)) {
        echo "Data inserted successfully.";
    } else if(!mysqli_stmt_execute($prep_stmt1) && mysqli_stmt_execute($prep_stmt2)){
        echo "Error: " . $sql1 . "<br>" . mysqli_error($connection);
    }else if(mysqli_stmt_execute($prep_stmt1) && !mysqli_stmt_execute($prep_stmt2)){
        echo "Error: " . $sql2 . "<br>" . mysqli_error($connection);
    }
}
