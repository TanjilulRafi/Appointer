<?php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT id, Name, Phone ,DoctorName,Time,Date FROM appointment WHERE id = $user_id";
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
    <title>Update Appointment Information</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="POST" action="" class="custom-form">
        <h2 class="text-center mt-4 mb-4">Update Appointment Information</h2>
            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['Name']; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $row['Phone']; ?>">
            </div>
            <div class="mb-3">
                <label for="dname" class="form-label">Doctor Name</label>
                <input type="text" class="form-control" id="dname" name="dname" value="<?php echo $row['DoctorName']; ?>">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="<?php echo $row['Time']; ?>">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Contact</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['Date']; ?>">
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
    $phone = $_POST['phone'];
    $dname = $_POST['dname'];
    $time = $_POST['time'];
    $date = $_POST['date'];

    $sql = "UPDATE appointment SET Name='$name', Phone='$phone',DoctorName='$dname',Time='$time',
    Date='$date' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: adminapp.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
