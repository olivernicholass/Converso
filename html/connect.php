<?php
$connection = mysqli_connect("localhost", "56862295", '56862295', "db_56862295", 3306);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }