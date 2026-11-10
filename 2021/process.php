<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $country = $_POST['country'];
    $comment = $_POST['comment'];
    $gender = $_POST['gender'];

    // Get selected degree levels
    $degree = $_POST['degree'] ?? [];

    $degree_list = implode(", ", $degree);

    // Insert into database
    $sql = "INSERT INTO students
    (firstname, email, subject, country, comment, gender, degree)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssss",
        $firstname,
        $email,
        $subject,
        $country,
        $comment,
        $gender,
        $degree_list
    );

    if ($stmt->execute()) {

        echo "<h2>Form submitted successfully!</h2>";
        echo "Your records have been saved.";

    } else {

        echo "Error: " . $stmt->error;

    }

    $stmt->close();
    $conn->close();

}

?>