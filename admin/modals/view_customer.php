<!-- add view_customer modal -->
<div class="modal fade" id="view_customer" tabindex="-1" role="dialog" aria-labelledby="#view_customer" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Customer Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <?php
                    $id = $result['customer_id'];
                    $get_user_record = $connection->query("select * from customer, street where customer.place_of_residence = street.street_id and customer_id = '$id'");
                    $result = mysqli_num_rows($get_user_record);
                    if($result >0){
                        $result = mysqli_fetch_array($get_user_record); ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"  id="name"class="form-control" value="<?php echo $result['customer_full_name']; ?>" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">phone number</label>
                                <input type="number" id="phone_number" class="form-control" value="<?php echo $result['phone_number']; ?>" placeholder="mobile number">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id="position" class="form-control" value="<?php echo $result['position_name']; ?>" placeholder="position">
                            </div>
                            <div class="form-group">
                                <label for="street">place of residence</label>
                                <input type="text" id="street" class="form-control" value="<?php echo $result['street_name']; ?>" placeholder="Full place_of_residence">
                            </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>