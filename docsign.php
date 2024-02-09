<?php
@include 'config.php'; 

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $spec = $_POST['Specialization'];
    $avail = $_POST['avail'];
    $contact = $_POST['contact'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_folder = 'up_image/'.$image;
    $fee = $_POST['fee'];
    $user_type = $_POST['user_type'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select * from doctor where Email='$email' ";
    $query = mysqli_query($conn,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        $error[] = "Email already exists";
    }else{
        if($password === $cpassword){
            $insertquery = "insert into doctor(Name, Email, Password, Specialization, Availability,
            Contact_Information, Image, Fee, User_type) values('$name','$email','$pass','$spec','$avail','$contact','$image','$fee','$user_type')";
            $iquery = mysqli_query($conn, $insertquery);
            if($iquery){
                move_uploaded_file($image_tmp, $image_folder);
                $success[] = "Account created Successfully";
                header('location:login.php');
            }
        }else{
            $error[] = "Password not matching";
        }
    }
};
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Welcome Doctor!</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo "<span class='error'> $error </span>";
                };
            };            
            ?>
            <input type="text" name="name" placeholder="Enter your Name" required>
            <input type="email" name="email" placeholder="Enter your Email" required>
            <input type="password" name="password" placeholder="Enter your Password" required>
            <input type="password" name="cpassword" placeholder="Confirm your Password" required>
            <select name="Specialization">
                <option value="Cardiology">Cardiology</option>
                <option value="Radiologists">Radiologists</option>
                <option value="Psychiatrists">Psychiatrists</option>
                <option value="Emergency Medicine">Emergency Medicine</option>
                <option value="Geriatrician">Geriatrician</option>
            </select><br>
            <label for="imageUpload" style="color: #FFFFFF;">Upload Image:</label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" id="imageUpload" style="width: 43%;" required>
            <select name="avail">
                <option value="10:00 AM - 05:00 PM">10:00 AM - 05:00 PM</option>
                <option value="04:00 PM - 11:00 PM">04:00 PM - 11:00 PM</option>
            </select>
            <input type="text" name="contact" placeholder="Mobile No." required>
            <select name="user_type">
                <option value="doctor">Doctor</option>
            </select>
            <input type="number" name="fee" placeholder="Fees per Appointment" required><br>
            <input type="submit" name="submit" value="Sign Up" class="form-btn">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </form>
    </div>
</body>
</html>