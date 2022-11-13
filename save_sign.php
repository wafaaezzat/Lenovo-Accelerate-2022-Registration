<?php
	$result = array();
	// $imagedata = base64_decode($_POST['img_data']);
	// $filename = md5(date("dmYhisA"));
	$full_name= $_POST['first'];
	$company = $_POST['hospital'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

include 'connect.php';
	if(!$link || mysqli_connect_errno()){

  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();

        $result['status'] = mysqli_connect_error();
    }else{


            //Location to where you want to created sign image
            // $file_name = 'doc_signs/'.$filename.'.png';
            // file_put_contents($file_name,$imagedata);
            mysqli_query($link, "INSERT INTO users_scd VALUES(NULL, '$full_name','$company', '$email', '$phone', now())")or die('Error:'.mysqli_error($link));

            $result['status'] = 1;
            // $result['file_name'] = $file_name;


    }




	echo json_encode($result);
?>
