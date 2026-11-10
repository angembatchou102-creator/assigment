<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "exam_form"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>