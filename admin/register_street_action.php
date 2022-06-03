<?php require_once('../include/config.php');
    if(isset($_POST['new_street'])){
        $street_name = $_POST['street_name'];

        if(empty($street_name)){
            $_SESSION['warning'] = "All Field Are Mandatory";
            header('location:street.php?key=warning');
        }else{
            $register_street = $connection->query("INSERT INTO street values(null, '$street_name')");
            if($register_street){
                $_SESSION['success'] = "New Street Registered successfully";
                header('location:street.php?key=success');
            }else{
                $_SESSION['warning'] = "Somthing Went Wrong, Please Try Again.";
                header('location:street.php?key=warning');
            }
        }
    }
?>