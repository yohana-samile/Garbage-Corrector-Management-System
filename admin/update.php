<?php require_once('../include/config.php');
    if(isset($_POST['update'])){
        $status = $_POST['status'];
        $update_status = $connection->query("UPDATE money_obtained SET status = '$status' where money = {$_GET['id']}");
        if($update_status){
            $_SESSION['success'] = "Money Taken successfully";
            header('location:money.php?key=success');
        }else{
            $_SESSION['warning'] = "Somthing Went Wrong, Please Try Again.";
            header('location:money.php?key=warning');
        }
    }
?>