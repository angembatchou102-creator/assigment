
<!DOCTYPE html>
<html>
<head>
    <title>Saved Form Data</title>
</head>
<body>

<h2>Student Information</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Zip Code</th>
    <th>Country</th>
</tr>

<?php

if (file_exists("hnd2023.txt")) {

    $file = fopen("hnd2023.txt", "r");

    // Skip the heading row
    fgetcsv($file);

    while (($data = fgetcsv($file)) !== false) {

        echo "<tr>";

        foreach ($data as $value) {
            echo "<td>" .
                 htmlspecialchars($value) .
                 "</td>";
        }

        echo "</tr>";
    }

    fclose($file);
}

?>

</table>
</body>
</html>
