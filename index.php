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
            <a href="#count">Counts</a>
            <a href="login.php">LogIn</a>
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signup</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="docsign.php">As Doctor</a></li>
                    <li><a class="dropdown-item" href="signup.php">As User</a></li>
                </ul>
            </div>
        </nav>
    </header>


    <section class="home" id="home">
        <div class="image">
            <img src="image/medical.png" alt="">
        </div>
        <div class="content">
            <h3>Stay Healthy</h3>
            <p>An reliable website. Where you can take appointment for your desired Doctor with some clicks and hassle free. We care for your Health and Time.</p>
        </div>
    </section>



    <div class="about" id="about">
        <h1 class="heading">
            <span>About</span> Us
        </h1>
        <div class="row">
            <div class="image">
                <img src="image/aboutgif.gif" alt="">
            </div>
            <div class="content">
                <h3>
                    We care about your time
                </h3>
                <p>In this fast evolving world. Time is so much valuable for you. For that reason to save you precious time we are here for you. By some clicking you can take our expert doctors appointment.</p>
                <p>Also we care for your health. It's not safe to go out while being ill. That is why you can easily take the appointment by staying in the home.</p>
            </div>
        </div>
    </div>



    <section class="doctors" id="doctors">
        <h1 class="heading">Our <span>Doctors</span></h1>
        <div class="box-container">
        <?php
            @include 'config.php'; 
            $sql = "SELECT * FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i=0;
                while($row = $result->fetch_assoc()) {
                    $id[$i] = $row["id"];
                    $name[$i] = $row["Name"];
                    $specialization[$i] = $row["Specialization"];
                    $image[$i] = $row["Image"];
                    $fee[$i] = $row["Fee"];
                    $i++;
                }
                } else {
                        echo "0 results";
                }
            ?>
            <?php
            for ($i = 0; $i < count($id); $i++) {
                echo '<div class="box">';
                echo '<img src="up_image/' . $image[$i] . '" alt="No image found!">';
                echo '<h3>' . $name[$i] . '</h3>';
                echo '<span>' . $specialization[$i] . '</span><br>';
                echo '<span>Fees: ' . $fee[$i] . 'Tk</span>';
                echo '</div>';
            }
            ?>
    </section>
    <section class="count" id = "count">
        <h1 class="heading">Total<span>Numbers</span></h1>
        <div class="box-container">
            <div class="cardBox">
                <div class="card">
                    <div>
                    <?php
                        @include 'config.php';
                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);

                        if ($result) {
                            $userrowCount = $result->num_rows;
                        }

                        $sql = "SELECT * FROM doctor";
                        $result = $conn->query($sql);

                        if ($result) {
                            $docrowCount = $result->num_rows;
                        }
                        
                        $sql = "SELECT * FROM appointment";
                        $result = $conn->query($sql);

                        if ($result) {
                            $appCount = $result->num_rows;
                        }

                        ?>
                        <div class="numbers"><?php echo $userrowCount; ?></div>
                        <div class="cardName">Users</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $docrowCount; ?></div>
                        <div class="cardName">Doctor</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $appCount; ?></div>
                        <div class="cardName">Appointments</div>
                    </div>
                </div>
            </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>