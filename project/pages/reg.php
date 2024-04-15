<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link rel="stylesheet" href="../style/login.css">
    <title>New User Register Here!</title>
</head>
<body>

<div class="container">
    <div class="blob-container">
        <div class="blob"></div>
        <!-- Remaining blobs omitted for brevity -->
    </div>

    <section>
        <div class="card">
            <div class="title">
                <img src="../assets/graphics_log.svg" class='logGraphics' style='height: 250px'/>
                <h1 style='font-size: 40px'>New User Register Here! 📝</h1>
            </div>
            <div class="description">
                <div class="login-form">
                    <h2>User Details</h2>
                    <form action="" method="POST">
                        <label for="username">User Name</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required><br>
                        <label for="contact">Contact number</label>
        <input placeholder="Enter your Contact number" pattern="[789][0-9]{9}" type="text" id="contact" name="contact" required><br>
        <label for="email">Email</label>
        <input placeholder="Enter your email address"  type="email" id="email" name="email" required><br>
        
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required><br>
                        <br>
                        &nbsp   &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp <button type="submit" value="submit">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Server configurations
    $servername = "localhost";
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "cms";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful"); window.location.href = "login.php";</script>';
    } else {
        echo '<script>alert("Registration failed");</script>';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
 <form action="../handlers/goHome.php" method="POST">
 <center> <button class="homeBtn">Back</button></center><br><br><br><br>
    </form>
</body>
</html>
