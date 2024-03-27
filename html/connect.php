<?php
$connection = mysqli_connect("localhost", "ss217", '$$Madstef1', "fanpit", 3306);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }