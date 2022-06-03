<?php require_once('../include/config.php');
    if(isset($_POST['new_customer_staff'])){
        $customer_full_name = $_POST['customer_full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];
        $profile = $_POST['profile'];
        $place_of_residence = $_POST['place_of_residence'];
        $position = $_POST['position'];

        if(empty($customer_full_name)){
            $_SESSION['warning'] = "All Field Are Mandatory";
            header('location:customer.php?key=warning');
        }else{
            $register_customer = $connection->query("INSERT INTO customer values(null, '$customer_full_name', '$username', '$password', '$phone_number', 'default.png', '$place_of_residence', '$position')");

            // get id
            $get = $connection->query("select customer_id from customer order by customer_id desc limit 1");
            $id = mysqli_num_rows($get);
            if($id >0){
                $id = mysqli_fetch_array($get);
                $who_pay = $id['customer_id'];
                $send_customer = $connection->query("INSERT INTO money_obtained values(null, 5000, 'inuse', '$who_pay')");
                if($send_customer){
                    $_SESSION['success'] = "New Customer Registered successfully";
                    header('location:customer.php?key=success');
                }else{
                    $_SESSION['warning'] = "Somthing Went Wrong, Please Try Again.";
                    header('location:customer.php?key=warning');
                }
            }
        }
    }
?>