<?php
$link = mysqli_connect("127.0.0.1", "root", "", "todologin");

if (!$link) {
    echo "Error: can't establish connection with MySQL." . PHP_EOL;
    echo "The error code: " . mysqli_connect_errno() . PHP_EOL;
    echo "The text of error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Connection with MySQL established!" . PHP_EOL;
// echo "Info about connection: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);
?>