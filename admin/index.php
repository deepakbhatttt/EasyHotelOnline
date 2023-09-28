<!-- http://localhost/A/admin/index.php -->
<?php
    require("inc/db_config.php");
    require("inc/essentials.php");
    
    session_start();
        if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
            echo "<script> window.location.href = 'dashboard.php'; </script>";

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login-Panel</title>
    <?php require("inc/links.php")?>
</head>
<style>
    .login-form {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 500px;
        transform: translate(-50%, -50%);
    }
</style>

<body>
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method ="POST" action="">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" required type="submit" class="btn bg-dark text-white shadow-none text">LOGIN</button>
            </div>
        </form>
    </div>

    <?php
        if(isset($_POST['login'])){
             $frn_data = filter($_POST);    //Filter the admin name and password

             $query = "SELECT * FROM `admin_data` WHERE `admin_name` = ? AND `admin_pass` = ? ";    //it is a prepared statement
             $values = [$frn_data['admin_name'],$frn_data['admin_pass']];
             $datatypes = "ss"; //admin_name and admin_pass are both string so ss
             $res = select($query,$values,$datatypes);
             if($res->num_rows==1){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['adminLogin'] = true;                
                $_SESSION['adminId'] = $row['sr_no'];                
                redirect('dashboard.php');
             }
             else{
                alert('error','Incorrect Login Credentials!'); 
             }

        }
    ?>

    <?php require('inc/scripts.php')?>    
    
</body>
</html>