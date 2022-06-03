<?php 
    require_once('includes/sidebar.php');
    require_once('includes/messages.php');
    if(isset($_GET['key'])){}
?>
<div class="main_container">
    <div class="row">
        <!-- cards -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="col mr-2">  
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <h4 class="text-xs text-primary font-bold-weight text-uppercase mb-1">Stock Balance</h4>
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                    <?php
                                        if($connection):
                                            $money_inuse =mysqli_query($connection, "SELECT SUM(amount_per_month) FROM `money_obtained` where status = 'inuse' ");
                                            $total = mysqli_fetch_array($money_inuse); ?>
                                            <span class="count"><?php echo 'sum: '.$total[0]; ?>Tsh</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>    
            </div>    
        </div>

        <!-- used money -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="col mr-2">  
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <h4 class="text-xs text-primary font-bold-weight text-uppercase mb-1">Money Used In Stock</h4>
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                    <?php
                                        if($connection):
                                            $money_inuse =mysqli_query($connection, "SELECT SUM(amount_per_month) FROM `money_obtained` where status = 'used' ");
                                            $total = mysqli_fetch_array($money_inuse); ?>
                                            <span class="count"><?php echo 'sum: '.$total[0]; ?>Tsh</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>    
            </div>    
        </div>
</div>
    <h3 class="text-center text-capitalize">Money Trunsactions</h3>
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
                            <th>Amount Paid Name</th>
                            <th>Paid By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                $get_street_record = $connection->query("SELECT * FROM money_obtained, customer WHERE money_obtained.who_pay = customer.customer_id ");
                                $result = mysqli_num_rows($get_street_record);
                                while($result = mysqli_fetch_array($get_street_record)):
                                    if($result > 0): ?>
                                        <tr>
                                            <td><?php echo $sn++; ?> </td>
                                            <td><?php echo $result['amount_per_month']; ?> </td>
                                            <td><?php echo $result['customer_full_name']; ?> </td>
                                            <td>
                                                <form action="update.php?id=<?php echo $result['money']; ?>" method="post">
                                                    <?php if($result['status'] == "inuse"){ ?>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="used" name="status" hidden placeholder="yohana samile">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" name="update" class="form-control" value="<?php echo $result['status']; ?>">
                                                            </div>
                                                        <?php }else{
                                                            echo $result['status'];
                                                        }
                                                    ?>
                                                </form>
                                             </td>
                                            <td>
                                                <a href="" onclick="myProfile()"><i class="fa fa-eye"></i></a>
                                                <a href=""><i class="fa fa-edit text-warning"></i></a>
                                            </td>
                                        </tr>
                                    <?php endif;
                                endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<div id="my_profile" hidden>
    <!-- king samile -->
    <form action="" method="POST">
        <?php
            // $id = $result['customer_id'];
            // $id = $_GET['customer_id'];
            $get_user_record = $connection->query("select * from customer, street where customer.place_of_residence = street.street_id");
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
                        <label for="street">place of residence</label>
                        <input type="text" id="street" class="form-control" value="<?php echo $result['street_name']; ?>" placeholder="Full place_of_residence">
                    </div>
        <?php } ?>
    </form>
</div>
<?php require_once('includes/footer.php'); ?>