<?php 
    require_once('includes/sidebar.php');
    if(isset($_GET['key'])){}
?>
<h3 class="text-center text-capitalize">This is list of registered staff</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_driver_staff">New Driver Staff <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>full name</th>
                        <th>email</th>
                        <th>Street Assined</th>
                        <th>profile</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $get_staff_record = $connection->query("SELECT * FROM staff, street, user_position WHERE
                                staff.position_id = user_position.position_id AND
                                staff.street_assined = street.street_id ");
                            $get_staff_result = mysqli_num_rows($get_staff_record);
                            while($get_staff_result = mysqli_fetch_array($get_staff_record)):
                                if($get_staff_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_staff_result['staff_full_name']; ?> </td>
                                        <td><?php echo $get_staff_result['email']; ?> </td>
                                        <td><?php echo $get_staff_result['street_name']; ?> </td>
                                        <td><img src="../<?php echo $get_staff_result['profile']; ?>" alt="" style="width: 50px;"> </td>
                                        <td>
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
    <?php require_once('modals/new_driver_staff.php'); ?>
</div>