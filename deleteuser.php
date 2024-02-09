<?php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM user WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: admin.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
header("Location: admin.php");
exit();
?>
