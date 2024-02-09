<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['name'])){
    header('location:login.php');

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <a href="" class="logo"><i class="fas fa-heartbeat">Appointer</i></a>
        <nav class="navbar">
            <a href="doctor.php">Home</a>
            <a href="logout.php">LogOut<ion-icon name="log-out-outline"></ion-icon></a>
        </nav>
    </header>

    <div class="about" id="about">
        <h1 class="heading">
            Hello <span><?php echo $_SESSION['name']; ?></span>
        </h1>
    </div>
    <section class="booking">
        <form action="" class="book-form" method="post">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" required><br>
        <input type="submit" name="submit" value="Show Appointments" class="btn">
        </form>
    </section>

    <div class="apptable">
    <?php
    @include 'config.php';

    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $doctorName = $_SESSION['name'];
        $sql = "SELECT * FROM appointment WHERE DoctorName = '$doctorName' AND Date = '$date'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo '<h2>Appointments for ' . $doctorName . ' on ' . $date . '</h2>';
            echo '<table class="table table-info table-striped">';
            echo '<tr><th>SL.</th><th>Name</th><th>Phone</th><th>Time</th></tr>';
            $i=1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Phone'] . '</td>';
                echo '<td>' . $row['Time'] . '</td>';
                echo '</tr>';
                $i++;
            }
            
            echo '</table>';
        } else {
            echo 'No appointments found for ' . $doctorName . ' on ' . $date;
        }
    }
    ?>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>