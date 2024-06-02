<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Enrollment Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>My enrollment form</h2>

    <?php
    include("./connection.php");
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $stmt = $conn->prepare("INSERT INTO user (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);

        // Execute the query
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="field">
            <label for="name">Enter Your Name:</label>
        <input type="text" id="name" name="name" required>
        </div>
        <div class="field">
            <label for="email">Enter Your Email:</label>
        <input type="email" id="email" name="email" required>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
