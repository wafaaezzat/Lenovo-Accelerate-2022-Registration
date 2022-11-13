<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SCD 360 conference</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <link href="./jquery.signaturepad.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/numeric-1.2.6.min.js"></script>
    <script src="./js/bezier.js"></script>
    <script src="./js/jquery.signaturepad.js"></script>

    <script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
    <script src="./js/json2.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style type="text/css">
        body{
            font-family:monospace;
        }
        #btnSaveSign {
            color: #fff;
            background: #0078e3;
            padding: 5px;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #signArea{
            max-width: 600px;
            width: 100%;
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
        .consent{
            color:#555;
            font-size:12px;
            padding-top:7px;
            padding-left:20px;
            border-top:#555 solid 1px;
        }
        #subs-content{
            padding-left:40px;
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
        <img class="center-block img-responsive" src="./logo/Pic_01 (1).png" style="max-width:730px;width: 100%;">
        <hr>
            <div id="result"></div>
            <form id="form" class="animated fadeIn slower" autocomplete="off">
                <div class="row col-md-offset-1">
                    <div class="form-group ">
                        <label for="first">Full Name</label>
                        <input type="text" id="first" class="form-control" name="first" placeholder="Please Enter Full Name" required>
                    </div>
                </div>
                <div class="row col-md-offset-1">
       
                    <div class="form-group ">
                        <label for="hospital">Company Name</label>
                        <input type="text" id="hospital" class="form-control" name="hospital" placeholder="Please Enter Company Name" required>
                    </div>
                    </div>
                    <div class="row col-md-offset-1">
                   <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email"  id="email" class="form-control" name="email" placeholder="Please Enter Email" required>
                    </div>
    </div>
    <div class="row col-md-offset-1">
                    <div class="form-group ">
                        <label for="phone">Phone number</label>
                        <input type="text"  id="phone" class="form-control" name="phone" placeholder="Please Enter Phone number" required>
                    </div>
                </div>
               

            </form>

    


            <button id="btnSaveSign" class="col-md-5 col-md-offset-4 myButton">Submit</button>


        </div>

    </div>
</main>



<script>
    $(document).ready(function() {

        //   var canvas = document.getElementById('signature-pad');

                    // Adjust canvas coordinate space taking into account pixel ratio,
                    // to make it look crisp on mobile devices.
                    // This also causes canvas to be cleared.
                    // function resizeCanvas() {
                    //     // When zoomed out to less than 100%, for some very strange reason,
                    //     // some browsers report devicePixelRatio as less than 1
                    //     // and only part of the canvas is cleared then.
                    //     var ratio =  Math.max(window.devicePixelRatio || 1, 1);
                    //     canvas.width = canvas.offsetWidth * ratio;
                    //     canvas.height = canvas.offsetHeight * ratio;
                    //     canvas.getContext("2d").scale(ratio, ratio);
                    // }

                    // window.onresize = resizeCanvas;
                    // resizeCanvas();

                    // var signaturePad = new SignaturePad(canvas, {
                    //     backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
                    // });

                    $('#clear').on('click', function () {
                        signaturePad.clear();
                    });

        $('#subs').on('click', ()=>{
            if($("#subs").prop('checked')){
                $('#subs-content').fadeIn();
            }else{
                
               $('#subs-content').fadeOut();
               $("input[name='options[]']:checked").each(function ()
                {
                    $(this).prop('checked', false);
                });
            }
        })
        $("#btnSaveSign").on('click', function(e){
            var first = $('#first').val(),
                hospital = $('#hospital').val(),
                email = $('#email').val(),
                phone = $('#phone').val(),
                errorText = 0,
                errorEmail = false;

            const validChars = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
            // const intRegex = /^\d+$/;
            const intRegex = /^[0-9-+]+$/;

            const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            // //debugger;
            if(first == ""){
                $('#first').addClass('danger');
                //console.log('before add', errorText)
                errorText++;
                //console.log('After add', errorText)

            }else{
                $('#first').removeClass('danger');
                //console.log('before min', errorText)
                //errorText--;
                //console.log('after min', errorText)

            }
            if(hospital == ""){
                $('#hospital').addClass('danger');
                errorText++;
            }else{
                $('#hospital').removeClass('danger');
                // errorText--;
            }
            if(email == "" || re.test(email) == false){
                $('#email').addClass('danger');
                errorText++;
            }else{
                $('#email').removeClass('danger');
                // errorText--;
            }
            if(phone == ""){
                $('#phone').addClass('danger');
                errorText++;
            }else{
                $('#phone').removeClass('danger');
                //errorText--;
            }
            
            
            

            //         if(address == ""){
            //             $('#address').addClass('danger');
            //              errorText++;
            //   }else{
            //             $('#address').removeClass('danger');
            //           // errorText--;
            //         }


            $('input[type="text"]').blur(function(){
                if($(this).val() == ""){
                    $(this).addClass('danger');
                    errorText++;
                }else{
                    $(this).removeClass('danger');
                }
            });

            $('input[type="email"]').blur(function(){
                if($(this).val() == ""){
                    $(this).addClass('danger');
                    errorEmail = false;
                }else{
                    $(this).removeClass('danger');
                    errorEmail = true;
                }
            });

            if(phone == "" || intRegex.test(phone) == false){
                $('#phone').addClass('danger');
                errorText++;
            }else{
                $('#phone').removeClass('danger');
                //errorText--;
            }

            if(errorText > 0){
                //console.log('ssss', errorText);
                return false;
            }

            $('input[type="text"]').each(function(){
                if($(this).val() == ""){
                    $(this).addClass('danger');
                    return false;
                }
            });






            //  if (signaturePad.isEmpty()) {
            //     Swal.fire({
            //         title: "Error!",
            //         text: "Please provide a signature first!",
            //         icon: "error",
            //     });

            //     return false;
            // }




              // var canvas_img_data = canvas.toDataURL('image/png');
            // var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                // var canvas_img_data = signaturePad.toDataURL('image/png');
                // var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");

            //     console.log(img_data);
            $('#btnSaveSign').attr('disabled','disabled');
            //ajax call to save image inside folder
            $.ajax({
                url: 'save_sign.php',
                data: {
                    first:first,
                    hospital:hospital,
                    email:email,
                    phone:phone
                },
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    if(response['status'] == 1){
                        Swal.fire({
                            title: "Succes!",
                            text: "Thanks For Registeration",
                            icon: "success",  
                        }).then(function(){
                                signaturePad.clear();
                                $('#form')[0].reset();
                            }
                        );
                        $('#form')[0].reset();
                        /*$('#result').html('<div class="alert alert-success" role="alert">Thanks For Registeration</div>');*/
                    } else if (response['status'] == 0){
                        Swal.fire({
                            title: "Error!",
                            text: "Please contact support!",
                            icon: "error",
                        });

                    }else if(response['status'] == 2){
                        Swal.fire({
                            title: "Error!",
                            text: "Please accept the terms!",
                            icon: "error",
                        });

                    }
                    $('#btnSaveSign').removeAttr('disabled');
                }
            });

        });



    });


</script>


</body>
</html>
