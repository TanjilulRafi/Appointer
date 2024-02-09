<?php
@include 'config.php'; 

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select * from admin where Email='$email' ";
    $query = mysqli_query($conn,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        $error[] = "Email already exists";
    }else{
        if($password === $cpassword){
            $insertquery = "insert into admin(Name, Email, Password, User_type) values('$name','$email','$pass','$user_type')";

            $iquery = mysqli_query($conn, $insertquery);

            if($iquery){
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">

        <form action="" method="post">
            <h3>Sign Up for Admin</h3>
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
            <select name="user_type">
                <option value="admin">Admin</option>
            </select><br>
            <input type="submit" name="submit" value="Sign Up" class="form-btn">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </form>
    </div>
</body>
</html>