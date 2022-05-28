<?php 
    require_once('include/config.php');
    if(isset($_POST['login'])){ 
        $username = $_POST["username"];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            $error = "all field are mandatory";
            $_SESSION['warning'] = $error;
            header('location:index.php?key=warning');
        }else{
            $username = $_POST['username'];
            $password = $_POST['password'];

            $get_user_record = $connection->query("SELECT * FROM customer WHERE username = '$username' AND password = '$password' limit 1");
            $result = mysqli_num_rows($get_user_record);
            if($result == 1){
                $result = mysqli_fetch_array($get_user_record);
                $_SESSION['user_data'] = $result;
                if($_SESSION['user_data']['position_id'] == 3){
                    header('location:customer/');
                }
            }
            else{
                $get_staff_record = $connection->query("SELECT * FROM staff WHERE email = '$username' and  password ='$password' limit 1");  
                $staff_result = mysqli_num_rows($get_staff_record);
                if($staff_result == 1){
                    $staff_result = mysqli_fetch_array($get_staff_record);
                    $_SESSION['staff_record'] = $staff_result;
                    if($_SESSION['staff_record']['position_id'] == 1){
                        header('location:admin/');
                    }else{
                        header('location:staff/');
                    }       
                }else{
                    $_SESSION['fail'] = "Wrong Usename Or Password";
                    header('location:index.php?key=fail');
                }
            }
        }
    }
?>
