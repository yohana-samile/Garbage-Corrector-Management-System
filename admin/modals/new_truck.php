<!-- add truck modal -->
<div class="modal fade" id="new_truck" tabindex="-1" role="dialog" aria-labelledby="#new_truck" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Register New Truck</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="register_truck_action.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="truck_plate_no" placeholder="Enter truck plate number" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="number" name="registered_by" value="<?php echo $_SESSION['staff_record']['staff_id']; ?>" placeholder="Enter registered_by" hidden required class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="new_truck" class="btn btn-primary">Register Truck</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>