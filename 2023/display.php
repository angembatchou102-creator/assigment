
<?php
include "db.php";

$sql = "SELECT * FROM SWE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>

<h2>Student Records</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Zip Code</th>
    <th>Country</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["zip_code"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["country"]) . "</td>";

        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}

$conn->close();

?>

</table>

</body>
</html>
