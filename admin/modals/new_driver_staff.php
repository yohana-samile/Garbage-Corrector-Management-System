<!-- add seller modal -->
<div class="modal fade" id="new_driver_staff" tabindex="-1" role="dialog" aria-labelledby="#new_driver_staff" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add New Staff</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="staff_full_name" placeholder="Enter full name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter email" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="position" class="form-control">
                            <!-- getting driver position -->
                            <?php
                                $select_position_record = $connection->query("SELECT * FROM `user_position`");
                                $select_position  = mysqli_num_rows($select_position_record);
                                while($select_position = mysqli_fetch_array($select_position_record)):
                                    if($select_position >0): ?>
                                        <option hidden>Choose Staff Position </option>
                                        <option value="<?php echo $select_position['position_id']; ?>"><?php echo $select_position['position_name']; ?></option>
                                    <?php endif;
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="position" class="form-control">
                            <!-- getting driver position -->
                            <?php
                                $select_street_record = $connection->query("SELECT * FROM `street`");
                                $select_street  = mysqli_num_rows($select_street_record);
                                while($select_street = mysqli_fetch_array($select_street_record)):
                                    if($select_street >0): ?>
                                        <option hidden>Choose Street To Assin Staff </option>
                                        <option value="<?php echo $select_street['street_id']; ?>"><?php echo $select_street['street_name']; ?></option>
                                    <?php endif;
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter password" required class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="new_driver_staff" class="btn btn-primary">Register Driver Staff</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>