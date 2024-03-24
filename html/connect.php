<?php
$connection = mysqli_connect("localhost", "root", "", "fanpit", 3306);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }