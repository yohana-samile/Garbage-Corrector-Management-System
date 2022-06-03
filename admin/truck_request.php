<?php 
    require_once('includes/sidebar.php');
    require_once('includes/messages.php');
    if(isset($_GET['key'])){}
?>
<h3 class="text-center text-capitalize">This is list of truck correcter request from user</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Time Requested</th>
                        <th>Requested By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $get_street_record = $connection->query("SELECT * FROM user_garbage_truck_request, customer where user_garbage_truck_request.requested_by = customer.customer_id ");
                            $result = mysqli_num_rows($get_street_record);
                            while($result = mysqli_fetch_array($get_street_record)):
                                if($result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $result['time_requested']; ?> </td>
                                        <td><?php echo $result['customer_full_name']; ?> </td>
                                        <td><?php echo $result['request_status']; ?> </td>
                                        <td>
                                            <a href="" onclick="myProfile()"><i class="fa fa-eye text-primary"></i></a>
                                            <a href=""><i class="fa fa-edit text-warning"></i></a>
                                            <a href=""><i class="fa fa-trash-o text-danger"></i></a>
                                        </td>
                                <?php endif;
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php'); ?>
</div>