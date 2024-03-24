<?php
require 'connect.php';

//Get Thread URL - for now, set to 0 for sample
//$thread_id = isset($_GET['thread_id']) ? $_GET['thread_id'] : null;
$threadid = 7;

$sql_thread = "SELECT * FROM thread WHERE threadid = ?";
$prep_stmt = mysqli_prepare($connection, $sql_thread);
mysqli_stmt_bind_param($prep_stmt, "i", $threadid);
mysqli_stmt_execute($prep_stmt);
$result_thread = mysqli_stmt_get_result($prep_stmt);
$thread = mysqli_fetch_assoc($result_thread);


if($thread){
 // Output thread details
    echo "<h1>{$thread['title']}</h1>";
    echo "<p>{$thread['content']}</p>";

}