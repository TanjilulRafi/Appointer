<?php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['doc_id'])) {
    $user_id = $_POST['doc_id'];

    $sql = "DELETE FROM doctor WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: admindoctor.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
header("Location: admindoc.php");
exit();
?>
