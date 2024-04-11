<?php

//LOCAL USER/PASS: localhost/root/(no password)/fanpit/(your port)
//SERVER SOURCE/USER/PASS/DATABASE/PORT: localhost/56862295/56862295/db_56862295/3307

// Establish the database connection
//for local
$connection = mysqli_connect("localhost", "root", '', "fanpit", 3306);

//for server
//$connection = mysqli_connect("localhost", "56862295", '56862295', "db_56862295", 3306);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

return $connection;
