<?php
    $conn = new mysqli('localhost', 'root', '', 'lab_5b');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['submit'])) {
            $matric = $_POST['matric'];
            $name = $_POST['name'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $accessLevel = $_POST['role'];
            $sql = "INSERT INTO users (matric, name, password, role) 
            
            VALUES ('$matric', '$name', '$password', '$accessLevel')";
        if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful!');</script>";
                echo '<p style="color: green;">Registration successful!</p>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1/new.min.css">
</head>
    <body>
    <h2>User Registration</h2>  
        
        <form action="register_page.php" method="POST">
            Matric: <input type="text" name="matric" required><br>
            
            Name: <input type="text" name="name" required><br>
            
            Password: <input type="password" name="password" required><br>
            
            Role:<select name="role" required>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
                </select><br>
            
                <button type="submit" name="submit">Register</button>
        </form>
        <button onclick="location.href='login_page.php'" style="padding: 10px 20px; background-color: #28A745; color: white; border: none; border-radius: 5px;">Return To Login Page</button>
    </body>
</html>