<?php session_start(); ?>
<?php $title = "Garbage-Corrector-Management-System"; ?>
<html>
    <head>
        <link rel = "stylesheet" href = "assets/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/kvm.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <title><?php echo $title; ?></title>
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
</head>
<body>
    <div class="container col-md-9 border border-primary">
        <div class="row">
            <div class="col-md-6">
                <h4>Make An Everoment Clean By Reporting An Live Picture.</h4>
                <div id="my_camera"></div>
                <!-- First, include the Webcam.js JavaScript Library -->
                <script type="text/javascript" src="assets/js/webcam.min.js"></script>
                
                <!-- Configure a few settings and attach camera -->
                <script language="JavaScript">
                        // function configure(){
                        Webcam.set({
                            width: 320,
                            height: 240,
                            image_format: 'jpeg',
                            jpeg_quality: 90
                        });
                        Webcam.attach( '#my_camera' );
                    // }
                </script>
                
                <!-- A button for taking snaps -->
                <form action="uploda.php" method="post">
                    <input type=button class="btn btn-primary text-center" value="Take Picture" onClick="take_snapshot()">
                    <a href="index.php">Back To Login</a>
                </form>
            </div>

            <!-- an captured image wiil appear here -->
            <div class="col-md-6">
                <div id="results" class="border border-primary">Your captured garbage picture will appear here...</div>
                <a href="webcamjs/webcam.min.js" download="results">Save</a>
                <!-- form result submition -->
                <div class="text-center">
                    <form action="">
                        <div class="form-group">
                            <!-- getting img name -->
                            <?php
                                $result = htmlentities('id="results"');
                                if($result){
                                    echo htmlentities($result);
                                }
                            ?>
                            <select name="" class="form-control" id="select_location">
                                <option value="" hidden>Choose Location To Make Report</option>
                                <option value="<?php echo "img-name"; ?>">location</option>
                            </select>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
			} );
		}


        // // saving img
        // function saveSnap(){
        //     // Get base64 value from <img id='imageprev'> source
        //     var base64image = document.getElementById("results").src;

        //     Webcam.upload( base64image, 'upload.php', function(code, text) {
        //             console.log('Save successfully');
        //         //console.log(text);
        //     });

        // }
	</script>
</body>
</html>