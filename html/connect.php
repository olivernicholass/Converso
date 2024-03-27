<?php
$connection = mysqli_connect("localhost", "ss217", '', "db_56862295", 3306);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }