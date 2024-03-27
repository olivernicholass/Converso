<?php

//LOCAL USER/PASS:
//SERVER USER/PASS: 56862295/56862295

$connection = mysqli_connect("localhost", "ss217", '$$Madstef1', "fanpit", 3306);


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}