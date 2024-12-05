<?php

session_start();

if (!isset($_SESSION['loggedIn'])) {
    header('Location: login_page.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'lab_5b');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "User not found!";
        exit;
    }

    $user = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];


    $stmt = $conn->prepare("UPDATE users SET name = ?, role = ? WHERE matric = ?");
    $stmt->bind_param("sss", $name, $role, $matric);

    if ($stmt->execute()) {
        header("Location: display_page.php");
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Current User</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1/new.min.css">
</head>
<body>
    <h2>Update User Details</h2>
    <form method="post" action="">
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" value="<?= htmlspecialchars($user['matric']); ?>" readonly><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']); ?>" required><br>

        <label for="role">Access Level:</label>
        <select id="role" name="role" required>
            <option value="student" <?= $user['role'] === 'student' ? 'selected' : ''; ?>>Student</option>
            <option value="lecturer" <?= $user['role'] === 'lecturer' ? 'selected' : ''; ?>>Lecturer</option>
        </select><br><br>

        <input type="submit" value="Update">

        <a href="display_page.php" style="padding: 8px 16px; background-color: red; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">Cancel</a>
    </form>
</body>
</html>
