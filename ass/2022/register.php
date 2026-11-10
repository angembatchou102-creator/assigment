<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $lastname = $_POST['lastname'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

   
    if ($password !== $repassword) {
        die("Passwords do not match!");
    }


    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

   
    $sql = "INSERT INTO students
    (lastname, course, gender, phone, address, email, password)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssss",
        $lastname,
        $course,
        $gender,
        $phone,
        $address,
        $email,
        $hashed_password
    );

    if ($stmt->execute()) {

        echo "<h2>Registration Successful!</h2>";
        echo "Your records have been saved.";

    } else {

        echo "Error: " . $stmt->error;

    }

    $stmt->close();
    $conn->close();

}

?>