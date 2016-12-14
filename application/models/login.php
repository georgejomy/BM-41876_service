<?php
header("Access-Control-Allow-Origin:*");

 $conn = mysqli_connect('13.76.209.146','root','baabteadmin123!','dbUser');

if(isset($_REQUEST['email']) && isset($_REQUEST['password']))
{

 $email = $_REQUEST['email'];
 $password = $_REQUEST['password'];

  $query = "select pk_int_login_id,vchr_first_name,vchr_last_name,vchr_prof_pic from tbl_user_login where vchr_user_name='$email' and vchr_password='$password'";

 $result = mysqli_query($conn,$query);
 if(mysqli_num_rows($result)==1)
 {
 	$rw[]=mysqli_fetch_assoc($result);
    // array_push($rw,"ResponseCode","200");
    // array_push($rw,"Msg","Success");
  $rw[0]['ResponseCode']="200";
  $rw[0]['Msg']="Success";
    // print_r($rw);
 	echo json_encode($rw);

 }
 else
 {
   $query = "select vchr_user_name,vchr_prof_pic from tbl_user_login where vchr_user_name='$email'";

  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1)
  {
  	$rw[]=mysqli_fetch_assoc($result);
    // array_push($rw,"ResponseCode","500");
    // array_push($rw,"Msg","Email id does not exis");
    $rw[0]['ResponseCode']="500";
    $rw[0]['Msg']="Password Incorrect!";
  	echo json_encode($rw);
      // echo "<script>console.log(JSON.parse($rw))</script>";
  }
  else
  {
    $er = array(["ResponseCode"=>"404","Msg"=>"Email id does not exist"]);
   	echo json_encode($er);
  }

 }
}
else{
  $er = array(["ResponseCode"=>"500","Msg"=>"Email or password is not defined"]);
  echo json_encode($er);
}

?>
