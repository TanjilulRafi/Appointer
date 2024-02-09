
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>

</title>
<link rel="stylesheet" href="css/admin.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>
<body>
    <header class="header">
    <div class="logo">
        <a style="text-decoration: none;color: white;" href="/">Appointer</a>
    </div>

    <div class="header-icons">
        <a style="text-decoration: none;color: white;" href="logout.php">LogOut<ion-icon name="log-out-outline"></ion-icon></a>
    </div>
    </header>
<div class="container_r">
    <nav>
        <div class="side_navbar">
        <span>Main Menu</span>
        <a style="text-decoration: none" href="admin.php"><ion-icon name="person-sharp"></ion-icon>User</a>
        <a style="text-decoration: none" href="admindoctor.php"><ion-icon name="medkit-sharp"></ion-icon>Doctor</a>
        <a style="text-decoration: none" href="adminapp.php"><ion-icon name="receipt-outline"></ion-icon>Appointments</a>
        </div>
    </nav>
    <diV class=custab>
    <?php
    @include 'config.php';
        $sql = "SELECT * FROM doctor ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>SL.</th><th>Name</th><th>Email</th><th>Specialization</th>
            <th>Availability</th><th>Contact</th><th>Fees</th><th>Update</th><th>Delete</th></tr></thead>";
            echo "<tbody>";
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$row["Name"]}</td>";
                echo "<td>{$row["Email"]}</td>";
                echo "<td>{$row["Specialization"]}</td>";
                echo "<td>{$row["Availability"]}</td>";
                echo "<td>{$row["Contact_Information"]}</td>";
                echo "<td>{$row["Fee"]} Tk</td>";
                echo "<td><a href='updatedoctor.php?id={$row["id"]}' class='btn btn-primary'>Update</a></td>";
                echo "<td>
                        <form method='POST' action='deletedoc.php'>
                            <input type='hidden' name='doc_id' value='{$row["id"]}'>
                            <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete Doctor?\")'>Delete</button>
                        </form>
                    </td>";
                echo "</tr>";
                $i++;
            }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }
    ?>
    </diV>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</html>
