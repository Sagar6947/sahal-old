<?php
$user = "Munesh012";
        $password = "Munesh012";
        $senderid = "EKAUMB";
        $smsurl = "http://smpp.webtechsolution.co/http-api.php?";

function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen($args[1],80, $errno, $errstr, 30);
    if (!$fp) {
    return("$errstr ($errno)");
    } else 
    {
        $args[3] = "C".$args[3];
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) 
        {
        $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}

function SMSSend($phone, $msg, $debug=false)
{
    global $user,$password,$senderid,$smsurl;
 
            $url = 'username='.$user;
            $url.= '&password='.$password;
            $url.= '&senderid='.$senderid;
            $url.= '&route='.'1';
            
            $url.= '&number='.urlencode($phone);
            $url.= '&message='.urlencode($msg);
            $url.= '&priority=1';
            $url.= '&dnd=1';
            $url.= '&unicode=0';

    $urltouse =  $smsurl.$url;
    if ($debug) { 
        $rc1 = "Request: <br>$urltouse<br><br>"; 
        
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urltouse);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Open the URL to send the message
    //$response = httpRequest($urltouse);
    $response = curl_exec($ch);
    curl_close($ch);
    if ($debug) 
    {
        $rc = "Response: <br><pre>".
        str_replace(array("<",">"),array("&lt;","&gt;"),$response).
        "</pre><br>"; 
        
    }

    
    // print_r($response);
    // exit();
}

include ("db_connect.php");

if (isset($_POST['Employee_submit'])) 
{

	$emp_name = mysqli_real_escape_string($conn , $_POST['emp_name']);
	$emp_designation = mysqli_real_escape_string($conn , $_POST['emp_designation']);
	$employee_web_url = mysqli_real_escape_string($conn , $_POST['employee_web_url']);


	$emp_address = mysqli_real_escape_string($conn , $_POST['emp_address']);
	$emp_email = mysqli_real_escape_string($conn , $_POST['emp_email']);
	$emp_no = mysqli_real_escape_string($conn , $_POST['emp_no']);
	$emp_whatsapp_no = mysqli_real_escape_string($conn , $_POST['emp_whatsapp_no']);
	
	$emp_fb = mysqli_real_escape_string($conn , $_POST['emp_fb']);

	$emp_insta = mysqli_real_escape_string($conn , $_POST['emp_insta']);
	$emp_whastapp = mysqli_real_escape_string($conn , $_POST['emp_whastapp']);
	$emp_linkdin = mysqli_real_escape_string($conn , $_POST['emp_linkdin']);
	$emp_twitter = mysqli_real_escape_string($conn , $_POST['emp_twitter']);
	$emp_password ="RK". rand(50000,1000);

$file=$_FILES['image']['name'];
	$tmpfile=$_FILES['image']['tmp_name'];
	$folder=$file;
	move_uploaded_file($tmpfile,'images/employee/'.$folder);


	$insert="INSERT INTO `employee`( `company_id`, `emp_name`, `employee_web_url`, `emp_email`, `image`, `emp_no`, `emp_address`, `emp_whatsapp_no`, `emp_designation`, `emp_whastapp`, `emp_fb`, `emp_insta`, `emp_linkdin`, `emp_twitter`, `employee_pass`) VALUES 
	('$company','$emp_name','$employee_web_url','$emp_email','$folder','$emp_no','$emp_address','$emp_whatsapp_no','$emp_designation','$emp_whastapp','$emp_fb','$emp_insta','$emp_linkdin','$emp_twitter','$emp_password')";
// 	echo $insert;
	if($conn->query($insert)){
	    
	    	$debug = true;     
		$message = 'Your UserID is '.$emp_no.' and Password is '.$emp_password.'.<br> Regards SaharDirectory.';
		SMSSend($company_contact,$message,$debug);
		
		echo'<script>alert("Your emp Registered Successfully")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
		echo'<script>window.location="employee-list.php"</script>';

}

?>

