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
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#doctors">Doctor</a>
            <a href="appointments.php">Appointments</a>
            <a href="logout.php">LogOut<ion-icon name="log-out-outline"></ion-icon></a>
        </nav>
    </header>

    <div class="about" id="about">
        <h1 class="heading">
            Hello <span><?php echo $_SESSION['name']; ?></span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="image\Chart-run-cycle.gif" alt="">
            </div>
            <div class="content">
                <h3>
                    Welcome to Appointer 
                </h3>
                <p>Hope you have a Busy schedule</p>
                </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>