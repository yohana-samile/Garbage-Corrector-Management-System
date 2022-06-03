<?php 
    require_once('includes/sidebar.php');
    require_once('includes/messages.php');
    if(isset($_GET['key'])){}
?>
<h3 class="text-center text-capitalize">This is list of live truck correcter request from user</h3>
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
                        <th>Steet Name</th>
                        <th>Garmage Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $get_request_record = $connection->query("SELECT * FROM live_garbage_request_picture, street where live_garbage_request_picture.street_name = street.street_id ");
                            $result = mysqli_num_rows($get_request_record);
                            while($result = mysqli_fetch_array($get_request_record)):
                                if($result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $result['street_name']; ?> </td>
                                        <td><?php echo $result['garbage_img']; ?> </td>
                                        <td>
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