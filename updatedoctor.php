<?php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT id, Name, Email,Specialization,Availability,Contact_Information,Fee FROM doctor WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Error: ' . $conn->error, E_USER_ERROR);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Doctor Information</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="POST" action="" class="custom-form">
        <h2 class="text-center mt-4 mb-4">Update Doctor Information</h2>
            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['Name']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>">
            </div>
            <div class="mb-3">
                <label for="spec" class="form-label">Specialization</label>
                <input type="text" class="form-control" id="spec" name="spec" value="<?php echo $row['Specialization']; ?>">
            </div>
            <div class="mb-3">
                <label for="avail" class="form-label">Availability</label>
                <input type="text" class="form-control" id="avail" name="avail" value="<?php echo $row['Availability']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Contact</label>
                <input type="number" class="form-control" id="contact" name="contact" value="<?php echo $row['Contact_Information']; ?>">
            </div>
            <div class="mb-3">
                <label for="fee" class="form-label">Fees</label>
                <input type="nuumber" class="form-control" id="fee" name="fee" value="<?php echo $row['Fee']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "User not found";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $spec = $_POST['spec'];
    $avail = $_POST['avail'];
    $contact = $_POST['contact'];
    $fee = $_POST['fee'];

    $sql = "UPDATE doctor SET Name='$name', Email='$email',Specialization='$spec',Availability='$avail',
    Contact_Information='$contact',Fee='$fee' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: admindoctor.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
