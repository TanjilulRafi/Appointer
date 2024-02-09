<?php
@include 'config.php'; 

session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailquery = "select Name, Email, Password, User_type from user where Email='$email' 
    union select Name, Email, Password, User_type from doctor where Email='$email' 
    union select Name, Email, Password, User_type from admin where Email='$email'";
    $query = mysqli_query($conn,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        $row = mysqli_fetch_assoc($query);
        $hash_pass = $row['Password'];
        $name = $row['Name'];

        if(password_verify($password, $hash_pass)){
            if($row['User_type'] == 'user'){
                $_SESSION['name'] = $name;
                header('location:user.php');
        }
        elseif($row['User_type'] == 'doctor'){
            $_SESSION['name'] = $name;
            header('location:doctor.php');
        }
        elseif($row['User_type'] == 'admin'){
            $_SESSION['name'] = $name;
            header('location:admin.php');
        }
        else{
            $error[] = "Invalid Email or Password";
        }
    }
}
    else{
        $error[] = "Invalid Email or Password";
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">

        <form action="" method="post">
            <h3>LogIn</h3>
            <?php
            if(isset($success)){
                foreach($success as $success){
                    echo "<span class='success'> $success </span>";
                };
            };
            if(isset($error)){
                foreach($error as $error){
                    echo "<span class='error'> $error </span>";
                };
            };            
            ?>
            <input type="email" name="email" placeholder="Enter your Email" required>
            <input type="password" name="password" placeholder="Enter your Password" required><br>
            <input type="submit" name="submit" value="Log In" class="form-btn">
            <p>Don't have an account? <a href="signup.php">SignUp</a></p>
        </form>
    </div>
</body>
</html>