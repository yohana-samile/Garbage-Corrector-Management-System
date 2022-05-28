<?php require_once('includes/sidebar.php'); ?>
<h3 class="text-center text-capitalize">This is list of registered street</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_driver_staff">New Street <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Steet Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $get_street_record = $connection->query("SELECT * FROM street ");
                            $result = mysqli_num_rows($get_street_record);
                            while($result = mysqli_fetch_array($get_street_record)):
                                if($result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $result['street_name']; ?> </td>
                                        <td>
                                            <a href=""><i class="fa fa-eye"></i></a>
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