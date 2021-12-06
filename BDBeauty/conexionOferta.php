<?php
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'bdbeauty'
);
if (isset($conn)) {
    #echo "BD conectada";
}
?>