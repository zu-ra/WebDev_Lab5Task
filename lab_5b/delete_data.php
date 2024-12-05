<?php
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $conn = new mysqli('localhost', 'root', '', 'lab_5b');
    $sql = "DELETE FROM users WHERE matric = '$matric'";
    $conn->query($sql);
    header("Location: display_page.php");
}
?>
