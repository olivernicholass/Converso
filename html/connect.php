<?php
$connection = mysqli_connect("localhost", "root", "", "fanpit", 3307);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }