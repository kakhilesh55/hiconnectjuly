<?php 
include "config.php";
$url =  $_SERVER['REQUEST_URI'];
$page = explode('/', $url);
// Program to display complete URL
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=== 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$ar = sizeof($page);
if($ar>1)
{
//$card_id ="niya";
$card_id =$page[2];


//$user_id = $_GET['user_id'];
if($card_id!='')
{

$user_details =mysqli_fetch_assoc(mysqli_query($con, "select * from users where user_id='$card_id'"));
$userid =  $user_details['id'];

session_start();
$_SESSION['user_id'] = $userid;

$theme_selected = mysqli_fetch_assoc(mysqli_query($con, "select * from user_theme where user_id='$userid'"));

$company_details = mysqli_fetch_assoc(mysqli_query($con, "select * from company where user_id='$userid'"));

$contact_details = mysqli_fetch_assoc(mysqli_query($con, "select * from contact_details where user_id='$userid'"));

$social_link_details = mysqli_fetch_assoc(mysqli_query($con, "select * from user_social_links where user_id='$userid'"));

$social_link_users = mysqli_query($con, "select u.*, s.social_link_type as social_media,s.social_class from user_social_links u inner join social_link_type s ON u.social_link_type = s.social_link_id and u.user_id= '$userid'");

$product_count = mysqli_num_rows(mysqli_query($con, "select * from products where user_id='$userid'"));
$product_details = mysqli_query($con, "select * from products where user_id='$userid'");

$services_count = mysqli_num_rows(mysqli_query($con, "select * from services where user_id='$userid'"));
$service_details = mysqli_query($con, "select * from services where user_id='$userid'");

$account_payment_details = mysqli_query($con, "select * from payment_details where user_id='$userid' and payment_type='Account'");
$wallet_payment_details = mysqli_query($con, "select * from payment_details where user_id='$userid' and payment_type='Wallet'");
$payment_account = mysqli_num_rows(mysqli_query($con, "select * from payment_details where user_id='$userid' and payment_type='Account'"));
$payment_wallet = mysqli_num_rows(mysqli_query($con, "select * from payment_details where user_id='$userid' and payment_type='Wallet'"));

$gallery_images_count = mysqli_num_rows(mysqli_query($con, "select * from gallery where user_id='$userid'"));
$gallery_images = mysqli_query($con, "select * from gallery where user_id='$userid'");

$testimonials_count = mysqli_num_rows(mysqli_query($con, "select * from testimonials where user_id='$userid'"));
$testimonials_details = mysqli_query($con, "select * from testimonials where user_id='$userid'");

$achievements_count = mysqli_num_rows(mysqli_query($con, "select * from achievements where user_id='$userid'"));
$achievements_details = mysqli_query($con, "select * from achievements where user_id='$userid'");

$education_count = mysqli_num_rows(mysqli_query($con, "select * from education where user_id='$userid'"));
$education_details = mysqli_query($con, "select * from education where user_id='$userid'");

$experience_count = mysqli_num_rows(mysqli_query($con, "select * from experience where user_id='$userid'"));
$experience_details = mysqli_query($con, "select * from experience where user_id='$userid'");

$qr_details = mysqli_fetch_assoc(mysqli_query($con,"select * from qr_images where user_id='$userid'"));

$user_id = $_SESSION['user_id'];

$ip = getUserIpAddr();

$qry = "SELECT * FROM `ipdb` WHERE `ip` = '$ip' and `user_id` = $user_id";
		$result = mysqli_query($con,$qry);
		$num = mysqli_num_rows($result);
		if ($num == 0){
			$qry3 = "INSERT INTO `ipdb`(`ip`,`user_id`) VALUES ('$ip',$user_id)";
			mysqli_query($con,$qry3);
			//echo "new ip register";	
			$qry1 = "SELECT * FROM `counter` WHERE `user_id` = $user_id";
			$result1 = mysqli_query($con,$qry1);
			$counter_num = mysqli_num_rows($result1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			if($counter_num == 0)
			{
				$count = 1;
				$qry4 = "INSERT INTO `counter` (`visiters`, `user_id`) VALUES($count, $user_id)";
				mysqli_query($con,$qry4);
			}
			else
			{
				$count = $row1['visiters'];
				$count = $count + 1;
				//echo "<br>";
				//echo "number of unique visiters is $count";
				$qry2 = "UPDATE `counter` SET `visiters`=$count WHERE `user_id`=$user_id";
				$result2=mysqli_query($con,$qry2);
			}
		}else{
			$qry1 = "SELECT * FROM `counter` WHERE `user_id` = $user_id";
			$result1 = mysqli_query($con,$qry1);
			$counter_num = mysqli_num_rows($result1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			if($counter_num == 0)
			{
				$count = 1;
				$qry4 = "INSERT INTO `counter` (`visiters`, `user_id`) VALUES($count, $user_id)";
				mysqli_query($con,$qry4);
			}
			else
			{
				$count = $row1['visiters'];
			}
		}
	}


}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

 
if(isset($_POST['submit'])){
    $to = "support@hiconnect.co.in"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $enquiryname = $_POST['enquiryName'];
    $phonenumber = $_POST['phoneNumber'];
    $subject = "Enquiry Form submission from Digital Card";
    $subject2 = "Copy of your Enquiry form submission Digital Card";
    $message = "Details : \n\n Name: ". $enquiryname . "\n\n Phone No.: ". $phonenumber. "\n\n Message: " .  $_POST['message']."\n\n";
    $message2 = "Here is a copy of your message. \n\n Details : \n\n Name: ". $enquiryname . "\n\n Phone No.: ". $phonenumber. "\n\n Message: " .  $_POST['message']."\n\n";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;

    if((isset($_POST['enquiryName'])&& $_POST['enquiryName'] !='') && (isset($_POST['email'])&& $_POST['email'] !=''))
    {
        $yourName = mysqli_real_escape_string($con, $_POST['enquiryName']);
        $yourEmail = mysqli_real_escape_string($con, $_POST['email']);
        $yourPhone = mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $comments = mysqli_real_escape_string($con, $_POST['message']);
        $date = mysqli_real_escape_string($con,date('Y-m-d'));

        $sql="INSERT INTO contact_form_info (`name`, `email`, `phone`, `comments`,`date`,`user_id`) VALUES ('".$yourName."','".$yourEmail."', '".$yourPhone."', '".$comments."', '".$date."','".$_SESSION['user_id']."')";

        if (!mysqli_query($con, $sql)) {
            echo "<script>alert('Error');</script>";
        }
        else
        {
            if(mail($to,$subject,$message,$headers))   
            {   
                mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender 
                echo "<script>alert('Thank you. We will contact you shortly.')</script>";    
            }
            else
            {
                 echo "<script>alert('Failed to send mail.')</script>";    
            }
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Please fill Name and Email'); document.getElementById('enquiryName').focus();</script>";
    }
    
}

if(isset($_POST['download_vcard'])){
    $vcard_details = $user_details;
    $vcard_details['company_name']=$company_details['company_name'];
    $vcard_details['mob1']=$contact_details['mob1'];
    $contactResult = $vcard_details;
    require_once "includes/VcardExport.php";
    $vcardExport = new VcardExport();
    $vcardExport->contactVcardExportService($contactResult);
    exit;
}

?> 