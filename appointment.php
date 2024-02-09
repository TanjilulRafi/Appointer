<?php
@include 'config.php'; 

if(isset($_POST['send'])){
    
    if($_POST['name']!="" && $_POST['phone']!="" && $_POST['date']!="" && $_POST['time']!="" && $_POST['dname']!=""){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dname = $_POST['dname'];

    $sql = "insert into appointment(Name, Phone, Date, Time, DoctorName) values('$name','$phone','$date','$time','$dname')";
    $iquery = mysqli_query($conn, $sql);

    if($iquery){
        echo '<script>alert("Appointment booked successfully");
        window.location.href = "user.php";</script>';
    }
}else{
    echo '<script>alert("Please fill all the fields");
    window.location.href = "appointment.php";</script>';
}
};
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
            <a href="index.php">Home</a>
            <a href="logout.php">LogOut<ion-icon name="log-out-outline"></ion-icon></a>
        </nav>
    </header>
    <section class="booking">
        <form action="" class="book-form" method="post">
        <h1>Book Appointment</h1><br>
        <div class="flex">
            <div class="inputbox">
                <span>Name: </span>
                <input type="text" name="name" id="name" placeholder="Enter your name">
            </div>
            <div class="inputbox">
                <span>Phone: </span>
                <input type="number" name="phone" id="phone" placeholder="Enter your phone">
            </div>
            <div class="inputbox">
                <span>Date: </span>
                <input type="date" name="date" >
            </div>
            <div class="inputbox">
                <span>Time: </span>
                <input type="time" name="time" >
            </div>
            <div class="inputbox">
            <?php
            @include 'config.php'; 
            $sql = "SELECT * FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $specializations = array();
                while($row = $result->fetch_assoc()) {
                    $specializations[] = $row["Specialization"];
                }
                $specializations = array_unique($specializations);
            } else {
                echo "0 results";
            }
            ?>
            <span>Specialization</span>
            <select name="spec">
            <?php
                foreach ($specializations as $specialization) {
                echo '<option value="' . $specialization . '">' . $specialization . '</option>';
                }
            ?>
            </select>
            </div>
            <input type="submit" name="cd" value="Check Doctor" class="btn">
            <?php
            if (isset($_POST['cd'])) {
                $selectedSpecialization = $_POST['spec'];

                $sql = "select Name from doctor where Specialization='$selectedSpecialization' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="inputbox">';
                    echo '<span>Doctor name: </span>';
                    echo '<select name="dname" id="dname" >';
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                } else {
                    echo 'No doctors found for the selected specialization.';
                }
            }
            ?>
        </div>
        <input type="submit" value="Book Appointment" class="btn" name="send">
        </form>

    </section>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>