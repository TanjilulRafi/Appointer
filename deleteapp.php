<?php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['app_id'])) {
    $user_id = $_POST['app_id'];

    $sql = "DELETE FROM appointment WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: adminapp.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
header("Location: adminapp.php");
exit();
?>
