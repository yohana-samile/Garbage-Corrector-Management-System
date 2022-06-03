<!-- add seller modal -->
<div class="modal fade" id="new_customer_staff" tabindex="-1" role="dialog" aria-labelledby="#new_customer_staff" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add New Customer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="register_customer.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="customer_full_name" placeholder="Enter Customer name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Enter username" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter password" hidden class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone_number" placeholder="Enter phone number" required class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="profile" placeholder="Enter profile" hidden class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="place_of_residence" class="form-control">
                            <!-- getting place_of_residence -->
                            <?php
                                $select_street_record = $connection->query("SELECT * FROM `street`");
                                $select_street  = mysqli_num_rows($select_street_record);
                                while($select_street = mysqli_fetch_array($select_street_record)):
                                    if($select_street >0): ?>
                                        <option hidden>Choose Customer Residence </option>
                                        <option value="<?php echo $select_street['street_id']; ?>"><?php echo $select_street['street_name']; ?></option>
                                    <?php endif;
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <!-- getting customer position -->
                        <?php
                            $select_position_record = $connection->query("SELECT * FROM `user_position` WHERE position_name = 'customer' ");
                            $select_position  = mysqli_num_rows($select_position_record);
                            while($select_position = mysqli_fetch_array($select_position_record)):
                                if($select_position >0): ?>
                                    <option hidden>Choose Customer Position </option>
                                    <input type="number" value="<?php echo $select_position['position_id']; ?>"  class="form-control" name="position">
                                <?php endif;
                            endwhile;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="new_customer_staff" class="btn btn-primary">Register Customer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>