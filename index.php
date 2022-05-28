<?php 
    $title = "Garbage-Corrector-Management-System";
    session_start();
    require_once('include/message.php');
?>
<html>
    <head>
        <link rel = "stylesheet" href = "assets/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <title><?php echo $title; ?></title>
        <style>
            /* loader */
            .loader {
                margin-top: 300px;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid blue;
                border-bottom: 16px solid blue;
                width: 120px;
                height: 120px;
                z-index: 9999;
            }


            /* help button */
            .help {
            width: 40px;
            margin: 0 auto;
            }

            .help .question {
            height: 40px;
            width: 40px;
            background: #ccc;
            font-size: 32px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            cursor: pointer;
            }

            .help .popup, .help .popup2 {
            width: 420px;
            height: 0px;
            text-align: left;
            overflow: hidden;
            position: relative;
            background: #eee;
            opacity: 0;
            transition: 1s;
            }

            .help .popup {
            left: -190px;
            top: 10px;
            }

            .help .popup2 {
            height: 220px;
            }

            .help .popup2 h4 {
            font-size: 18px;
            padding: 10px;
            margin: 0;
            }

            .help:hover .popup {
            opacity: 1;
            height: 270px;
            }

            .help .tell-me p:first-child {
            color: #317eac;
            cursor: pointer;
            }

            .tell-me {
            width: 150px;
            }

            .help .tell-me:hover .popup2 {
            top: -220px;
            opacity: 1;
            }

            .help .popup h3 {
            margin: 0;
            padding: 10px 0 0 10px;
            height: 30px;
            background: #555;
            color: #fff;
            font-weight: 400;
            font-size: 18px;
            }

            .help .popup p {
            font-size: 16px;
            padding: 10px;
            margin: 0;
            }

            .help .popup .popup2 .sub-levels {
            padding: 0 0 10px 140px;
            }

            .help .popup .popup2 .sub-levels strong {
            font-size: 20px;
            }

            .help .popup .popup2 p:nth-child(5) {
            padding: 20px 0 0 10px;
            }

            .help .popup a {
            text-decoration: none;
            color: #317eac;
            }

            .help .popup a:visited {
            color: #317eac;
            }

            .help .popup p em {
            font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center text-center">
            <div class="loader"></div>
        </div>
        <div>
            <div id="page" class="container-fluid mt-0 bg-light">
                <div id="page-content" class="row">
                    <div id="region-main-box" class="col-12">
                        <section id="region-main" class="col-12" aria-label="Content">
                            <div role="main"><span id="maincontent"></span><div class="my-1 my-sm-2"></div>
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-sm-8 ">
                                    <div class="card">
                                        <div class="card-block">
                                            <h3 class="card-header text-center text-dark"><img src="default.png" class="img-fluid" style="height: 100px;"><br>Garbage-Corrector-Management-System</h3>
                                            <div class="card-body">

                                                <div class="row justify-content-md-center">
                                                    <div class="col-md-8">
                                                        <form class="mt-2" action="login_action.php" method="post" autocomplite="off" role="form">
                                                            <?php if(isset($_GET['key'])): endif; ?>
                                                            <div class="form-group">
                                                                <label for="username" class="sr-only">Username</label>
                                                                <input type="text" name="username" id="username" class="form-control bg-light" value="" placeholder="Username" autocomplete="username">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="sr-only">Password</label>
                                                                <input type="password" name="password" id="password" value="" class="form-control bg-light" placeholder="Password" autocomplete="current-password">
                                                            </div>
                                                            <div class="rememberpass mt-3 text-center">
                                                                <input type="checkbox" name="rememberusername" id="rememberusername" value="1" checked="checked" />
                                                                <label for="rememberusername">Remember username</label>
                                                            </div>

                                                            <button type="submit" name="login" class="btn btn-primary btn-block mt-3">Log in</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Added by yohana samile -->
                                                <div class="forgetpass mt-2 text-center">
                                                    <p><a href="#">Forgotten your username or<br> password?</a></p>
                                                </div>
                                            </div>

                                            <!-- added by yohana samile (samileking9@gmail.com) -->
                                            <div class="help">
        
                                                <div class="question">?</div>
                                                    <div class="popup">
                                                        <h3 class="bg-primary text-center">We Are Here To Help You?</h3>
                                                        <p>For Any Case or problem Please Make Contact With Us Throgh Email And Mobile number Below .</p>
                                                        <p><strong>We Respect Your Thouth</strong>.</p>
                                                        <p>Contact With Our Developer For More Help<br>
                                                            Email: samileking9@gmail.com <br>
                                                            Mobile Number: +255620350083 / +255745668527
                                                        </p><br>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <!-- end help  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="text-center my-3">
                            <a href="report_live_picture.php" class="text-center" target="_black">Report Live Garbage Without Login !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                                                
<?php require_once('include/footer.php'); ?>
        <!-- scrpts -->
        <script src="assets/js/jquery3-6.js"></script>
            <script type="text/javascript">
                $(window).on('load', function () {
                $('.loader').fadeOut('slow');
                });
            </script>
        <script src="assets/js/kvm.js"></script>
    </body>
</html>