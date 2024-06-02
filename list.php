<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Registered Users</title>
</head>
<body>
    <h2>List of Registered Users</h2>

    <?php
    include("./connection.php");

    // Query to select all users
    $sql = "SELECT id, name, email, timestamp FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Timestamp</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Format the timestamp
            $formattedDate = (new DateTime($row['timestamp']))->format('d F, Y g:i A');

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($formattedDate) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>
