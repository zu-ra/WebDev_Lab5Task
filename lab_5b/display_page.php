<?php
    session_start();
        if (!isset($_SESSION['loggedIn'])) {
        header('Location: login_page.php');
        exit;
        }

    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'lab_5b');


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to select data
    $sql = "SELECT matric, name, role FROM users";


    $result = $conn->query($sql);
    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    // Handle logout action
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: login_page.php');
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users List Details</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1/new.min.css">
    
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        
        .logout {
            margin-bottom: 20px;
        }
    </style>
    
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "?logout=true";
            }
        }
    </script>

</head>
<body>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Access Level</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['matric']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td>
                <a href="update_details.php?matric=<?= $row['matric']; ?>">Update</a> |
                <a href="delete_data.php?matric=<?= urlencode($row['matric']) ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

            <!-- Logout button-->
    <div class="logout">
        <button onclick="confirmLogout();" style="padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px;">Logout</button>
    </div>
</body>
</html>

<?php
$conn->close();
?>
