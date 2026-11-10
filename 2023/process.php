
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $zip = trim($_POST["zip_code"]);
    $country = trim($_POST["country"]);

    if (empty($name) || empty($email) ||
        empty($zip) || empty($country)) {

        die("All fields are required!");
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address!");
    }

    
    $file = fopen("hnd2023.txt", "a");

    if ($file === false) {
        die("Unable to open text file!");
    }

    if (filesize("hnd2023.txt") == 0) {
        fputcsv($file, ["Name", "Email", "Zip Code", "Country"]);
    }

    fputcsv($file, [$name, $email, $zip, $country]);

    fclose($file);

  
    include "db.php";

   
    $sql = "INSERT INTO SWE
            (name, email, zip_code, country)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $name,
        $email,
        $zip,
        $country
    );

    if ($stmt->execute()) {

        echo "Registration successful!";

        echo "<br><a href='display.php'>View Records</a>";

    } else {

        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}
?>