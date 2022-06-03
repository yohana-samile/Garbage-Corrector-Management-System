<?php require_once('../include/config.php');
    if(isset($_POST['new_truck'])){
        $truck_plate_no = $_POST['truck_plate_no'];
        $registered_by = $_POST['registered_by'];

        if(empty($truck_plate_no)){
            $_SESSION['warning'] = "All Field Are Mandatory";
            header('location:truck.php?key=warning');
        }else{
            $check_if_truck_exit = $connection->query("select * from truck");
            $result = mysqli_num_rows($check_if_truck_exit);
            if($result >0){
                $result = mysqli_fetch_array($check_if_truck_exit);
                if($result == $truck_plate_no){
                    $_SESSION['fail'] = "This Truck Exit";
                    header('location:truck.php?key=fail');
                }
            }else{
                $register_truck = $connection->query("INSERT INTO truck values(null, '$truck_plate_no', '$registered_by')");
                if($register_truck){
                    $_SESSION['success'] = "New Truck Registered successfully";
                    header('location:truck.php?key=success');
                }else{
                    $_SESSION['warning'] = "Somthing Went Wrong, Please Try Again.";
                    header('location:truck.php?key=warning');
                }
            }
        }
    }
?>