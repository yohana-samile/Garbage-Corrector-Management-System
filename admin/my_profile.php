<?php require_once('includes/sidebar.php'); ?>
    <div class="container">
        <form action="">
            <?php
                $get_user_record = $connection->query("select * from staff, user_position, street where staff.position_id = user_position.position_id and staff.street_assined = street.street_id and staff_id = {$_SESSION['staff_record']['staff_id']}");
                $result = mysqli_num_rows($get_user_record);
                if($result >0){
                    $result = mysqli_fetch_array($get_user_record); ?>
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text"  id="name"class="form-control" value="<?php echo $result['staff_full_name']; ?>" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">email OR usename</label>
                            <input type="text" id="email" class="form-control" value="<?php echo $result['email']; ?>" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="position">Your Position</label>
                            <input type="text" id="position" class="form-control" value="<?php echo $result['position_name']; ?>" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="street">Street Assined</label>
                            <input type="text" id="street" class="form-control" value="<?php echo $result['street_name']; ?>" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right">Update Profile</button>
                        </div>
            <?php } ?>
        </form>
    </div>
<?php require_once('includes/footer.php'); ?>