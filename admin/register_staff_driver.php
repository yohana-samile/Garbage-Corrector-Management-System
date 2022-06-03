<?php require_once('../include/config.php');
    if(isset($_POST['new_driver_staff'])){
        $staff_full_name = $_POST['staff_full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $profile = $_POST['profile'];
        $street_assined = $_POST['street_assined'];
        $position_id = $_POST['position_id'];
        $password =1234;

        if(empty($staff_full_name)){
            $_SESSION['warning'] = "All Field Are Mandatory";
            header('location:driver.php?key=warning');
        }else{
            $register_driver = $connection->query("INSERT INTO staff values(null, '$staff_full_name', '$email', '$password', 'default.png', '$street_assined', '$position_id')");
                if($register_driver){
                    $_SESSION['success'] = "New Driver Staff Registered successfully";
                    header('location:driver.php?key=success');
                }else{
                    $_SESSION['warning'] = "Somthing Went Wrong, Please Try Again.";
                    header('location:driver.php?key=warning');
                }
        }   
    }
?>