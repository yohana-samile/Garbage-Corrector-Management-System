<?php require_once('../includes/config.php') ?>
<?php require_once('../includes/mustlogin.php') ?>
<?php  
    // $data = ['user_id'=>$_SESSION['UserID']];
    // $user_profile_detatile_sql = "SELECT * FROM user WHERE user_id = :user_id"; 
    // $user_profile_detatile_query = $dbh->prepare($user_profile_detatile_sql);
    // $user_profile_detatile_query->execute($data);
    // $user_profile_detatile = $user_profile_detatile_query->fetch(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Komba Vehicle management system">
    <meta name="author" content="Komba Vehicle management system">
    <link rel="icon" href="../icon.png" type="image/png">
    <title>KVMS | <?PHP echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/kvm.css" rel="stylesheet">

     <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .bg {
            background-color: #024e5a;
        }
        .vms-btn {
            background-color: #024e5a;
            color: whitesmoke;
            transition: ease-in 0.4s all;
        }
        .vms-btn:hover {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .vms-btn:focus {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .btn-success {
            background-color: #024e5a;
        }

        .kvm-bg {
            background-color: #024e5a;
        }

        .kvm-color {
            color: #024e5a;
        }

        #search_date, #search_exipendture_type {
            cursor: pointer;
        }
        #search_date, #search_exipendture_type:hover {
            color: #04AA6D;
        }

        .form-control{
            border: none;
            border-radius: 0px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #024e5a;
        }
        .form-control: focus{
            outline: none;
            box-shadow: none;
            border: none;
            border-radius: 0px;
            margin-top: 13px;
            margin-bottom: 20px;
            border-bottom: 1px solid #024e5a;
        }

        /*checkbox customization*/
             .checkbox input {
            cursor: pointer;
        }

        .checkbox input[type='checkbox'] {
            display: none;
        }

        .checkbox span {
            background-color: #fff;
            padding: 10px 30px;
            color: #024e5a;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            font-size: 16px;
            user-select: none;
            overflow: hidden;
            transition: 0.5s all;
            border: 1px solid #024e5a;
        }

        .checkbox span:hover {
            background-color: #024e5a;
            padding: 10px 30px;
            color: #fff;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            font-size: 16px;
            user-select: none;
            overflow: hidden;
        }

        .checkbox input[type='checkbox']:checked ~ span {
            background-color: #024e5a;
            box-shadow: 0 2px 10px #024e5a;
            color: #fff;
        }
        /*end checkbox customization*/

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav kvm-bg sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KVMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Component"
                    aria-expanded="true" aria-controls="Component">
                    <i class="fas fa-fw fa-user"></i>
                    <span> User Management</span>
                </a>
                <div id="Component" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management:</h6>
                        <a class="collapse-item" href="driver.php"> 
                            <i class="fa fa-user text-danger"></i> Driver
                        </a>
                        <a class="collapse-item" href="user.php">
                            <i class="fa fa-user-circle text-danger"></i> User
                        </a>
                    </div>
                </div>
            </li>

              <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#carcomponent"
                    aria-expanded="true" aria-controls="carcomponent">
                    <i class="fas fa-fw fa-bus"></i>
                    <span>  Vehicle Management  </span>
                </a>
                <div id="carcomponent" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vehicles:</h6>
                        <a class="collapse-item" href="vehicle.php">
                            <i class="fas fa-fw fa-car text-danger"></i> vehicle
                        </a>
                        <a class="collapse-item" href="maintainance.php">
                            <i class="fas fa-fw fa-wrench text-danger"></i> Maintainance
                        </a>
                        <h6 class="collapse-header">Car Components:</h6>
                        <a class="collapse-item" href="brand.php">
                            <i class="fa fa-database text-danger"></i> Brand
                        </a>
                        <a class="collapse-item" href="engine_type.php">
                            <i class="fa fa-database fa-sm text-danger"></i> Engine
                        </a>
                        <a href="fuel_type.php" class="collapse-item">
                            <i class="fas fa-gas-pump text-danger"></i> Fuel type
                        </a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
               <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#income"
                    aria-expanded="true" aria-controls="Component">
                    <i class="fa fa-fw fa-money "></i>
                    <span> Income </span>
                </a>
                <div id="income" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <h6 class="collapse-header">Income Management:</h6>
                        <a class="collapse-item" href="income.php"> 
                            <i class="fa fa-money text-danger"></i> income
                        </a>
                        <a class="collapse-item" href="income-source.php">
                            <i class="fa fa-list text-danger"></i> Income Source
                        </a>
                        
                        <h6 class="collapse-header">Accounts Management:</h6>
                        <a class="collapse-item" href="account-balance.php"> 
                            <i class="fa fa-bank text-danger"></i> Account Balance
                        </a>
                        <a class="collapse-item" href="account-chart.php">
                            <i class="fa fa-list text-danger"></i> Account Chart
                        </a>

                        <h6 class="collapse-header">Expenditure Management:</h6>
                        <a class="collapse-item" href="expenditure.php"> 
                            <i class="fa fa-money text-danger"></i> Expenditures
                        </a>
                        <a class="collapse-item" href="expenditure-type.php">
                            <i class="fa fa-gears text-danger"></i> Expenditure type
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
              

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                              
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="user-profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="logs.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    