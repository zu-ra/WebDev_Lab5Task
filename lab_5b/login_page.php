<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1/new.min.css">
</head>
<body>
    <h1>Login Page</h1>

    <form action="" method="post">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>

    <p><a href="register_page.php">Register here</a> if your account has not been set up yet</p>
</body>
</html>

<?php
session_start();
if (isset($_POST['login'])) {

    $conn = new mysqli('localhost', 'root', '', 'lab_5b');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['matric'] = $matric;
            header('Location: display_page.php');
            exit;
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

