<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		    <title>SCD 360 conference</title>
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<link href="./css/jquery.signaturepad.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./js/numeric-1.2.6.min.js"></script>
		<script src="./js/bezier.js"></script>
		<script src="./js/jquery.signaturepad.js"></script>

		<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
		<script src="./js/json2.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style type="text/css">
			body{
				font-family:monospace;
			}
			#btnSaveSign {
				color: #fff;
				background: #f99a0b;
				padding: 5px;
				border: none;
				border-radius: 5px;
				font-size: 20px;
				margin-top: 10px;
			}
			#signArea{
				width:304px;
				margin: 10px 10px;
			}
			.sign-container {
				width: 60%;
				margin: auto;
			}
            .p-25{
                padding: 27px 0;
            }
			.sign-preview {
				width: 150px;
				height: 50px;
				border: solid 1px #CFCFCF;
				margin: 10px 5px;
			}
			.tag-ingo {
				font-family: cursive;
				font-size: 12px;
				text-align: left;
				font-style: oblique;
			}
            .checkbox label, .radio label {
                min-height: 20px;
                padding-left: 20px;
                margin-bottom: 0;
                font-weight: bold;
                cursor: pointer;
                font-size: 11px;
            }
            .danger{
                border: red 2px solid;
            }
            .coloRed{
                color: darkred;
            }
             @media print {
                 body, container{
                     padding:0 !important;
                     margin:0 !important;
                 }
            .btn{
                display: none;
            }
            .form-control{
                border-bottom:1px;
            }
        }
		</style>
	</head>
	<body>

        <div class="container">
            <div class="col-md-8 col-md-offset-2">
        <img class="center-block img-responsive" src="Aimoving Emailer (1).png" style="max-width:730px;width: 100%;">
        <h2 class="text-center">SCD 360 conference Registeration<br> <small>4th & 5th of November - Venue Crown Plaza Al Salam</small></h2>
                <hr>
                <div id="result">
                    <?php
                  error_reporting(0);
                  $id = $_GET['id'];
                  include 'connect.inc';
                  $query = mysqli_query($link, "SELECT * FROM users_scd WHERE id=$id");
                  $num = mysqli_num_rows($query);
                  if($num == 0){
                      echo '<div class="alert alert-danger">PLEASE FOLLOW THE CORRECT LINK</div>';
                      exit();
                  }
                  $fetch = mysqli_fetch_array($query);
                  ?>
                </div>
                <form id="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first">Name</label>
                            <p class="form-control"><?=$fetch['first_name']?></p>
                        </div>
                        <!-- <div class="form-group col-md-6">
                            <label for="hospital">National/Iqama ID</label>
                            <p class="form-control"><?=$fetch['last_name']?></p>
                        </div> -->
                    </div>
                    <div class="row">
                        <!-- <div class="form-group col-md-6">
                            <label for="speciality ">Speciality </label>
                            <p class="form-control"><?=$fetch['speciality']?></p>
                        </div> -->
                        <div class="form-group col-md-6">
                            <label for="hospital">Hospital or institution</label>
                            <p class="form-control"><?=$fetch['hospital']?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <p class="form-control"><?=$fetch['email']?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone number</label>
                            <p class="form-control"><?=$fetch['phone']?></p>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="form-group col-md-6">
                            <label for="phone">Address (Hospital)</label>
                            <p class="form-control"><?=$fetch['middle_name']?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">SCFHS card number</label>
                            <p class="form-control"><?=$fetch['scfhs']?></p>
                        </div> -->
                    </div>
                    <!-- <div class="row">
                        <div id="checkboxx" class="checkbox">
                            <label>
                                  I accept the processing of my personal information by Novartis for registration purposes as per <a href="//image.oncologymail.novartis.com/lib/fe9113737463047b73/m/4/40493a6e-719a-4b3f-a7c5-4fcabd93a739.pdf" target="_blank">Novartis Privacy Policy</a>. 
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="checkboxx" class="checkbox">
                            <label>
                                  I accept to receive visits of any type (including but not limited to physical and virtual) from Novartis Group and I acknowledge and consent that Novartis may use, store, process and/or transfer my personal information accordingly with <a href="//image.oncologymail.novartis.com/lib/fe9113737463047b73/m/4/15dc57cd-8ba9-4884-87a0-8700fa1bc99f.pdf" target="_blank">HCP Privacy Policy</a>. 
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div id="checkboxx" class="checkbox">
                            <label>
                                  I consent to receive digital communications from Novartis Group by ( And you can opt out of our digital communications at any time by using the “unsubscribe” option in our digital message)
                            </label>
                            <p class="form-control"><?=$fetch['digital']?></p>
                        </div>
                    </div>
 -->

                </form>
                <!-- <div id="signArea" >
                    <h2 class="tag-ingo"> signature,</h2>
                       <img class="img img-thumbnail" src="<?=$fetch['signature']?>">
                </div> -->


    <button type="button" name="print" onclick="window.print();return false;" class="btn btn-info btn-group-lg">Print </button>
    <button type="button" name="home" onclick="home()" class="btn btn-warning btn-group-lg">Homepage </button>

            </div>

        </div>


<script src="jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".alert").delay(2000).fadeOut(300, function () {
            window.print();
        });


    });
    function home() {
        window.location.href = 'index.php';
    }
    function disableF5(e) { if (e.which == 116) e.preventDefault(); };
    // To disable f5
    $(document).bind("keydown", disableF5);
</script>


	</body>
</html>
