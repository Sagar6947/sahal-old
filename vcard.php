<?php
function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $path = explode('/', $_SERVER['REQUEST_URI']);
  }
return $path;
}

$path_info = parse_path();
if (!empty($path_info[2])) {
	$_GET['ecard_url'] = $path_info[3];
}
 if (!empty($_GET['ecard_url'])) {
  include 'admin/db/db_connect.php';
   $select_employee=$conn->query("SELECT * FROM `employee` WHERE `employee_status` = '0' AND `employee_web_url` = '".$_GET['ecard_url']."' ");
   if (mysqli_num_rows($select_employee) > 0) {
         $select_employee_row=$select_employee->fetch_assoc();
       $select_company=$conn->query("SELECT * FROM `company` WHERE `company_status` = '0' AND `company_id` = '".$select_employee_row['company_id']."' ");
       if (mysqli_num_rows($select_company) > 0) {
         $select_company_row=$select_company->fetch_assoc();
         	$email='';
            if (!empty($select_employee_row['employee_email'])){ 
                $email = $select_employee_row['employee_email']; 
            }else { 
                if (!empty($select_company_row['company_email'])) {
                    $email = $select_company_row['company_email'];
                }
            }

            if (!empty($select_employee_row['employee_web_title'])){ 
                $web_title = $select_employee_row['employee_web_title']; 
            }else { 
                if (!empty($select_company_row['company_web_title'])) {
                    $web_title = $select_company_row['company_web_title'];
                }
            }

            if (!empty($select_employee_row['employee_contact'])){ 
                $contact = $select_employee_row['employee_contact']; 
            }else { 
                if (!empty($select_company_row['company_contact'])) {
                    $contact = $select_company_row['company_contact'];
                }
            }

            if (!empty($select_employee_row['employee_logo'])){ 
                $card_logo = 'img/employee/'.$select_employee_row['employee_logo']; 
            }else { 
                if (!empty($select_company_row['company_logo'])) {
                    $card_logo = 'img/company/'.$select_company_row['company_logo'];
                }
            } 
                          
                                
		  // define here all the variable like $name,$image,$company_name & all other
		  header('Content-Type: text/x-vcard');  
		  header('Content-Disposition: inline; filename= "'.$web_title.'.vcf"');  

		  if($card_logo!=""){ 
		    $getPhoto               = file_get_contents($card_logo);
		    $b64vcard               = base64_encode($getPhoto);
		    $b64mline               = chunk_split($b64vcard,74,"\n");
		    $b64final               = preg_replace('/(.+)/', ' $1', $b64mline);
		    $photo                  = $b64final;
		  }
		  $vCard = "BEGIN:VCARD\r\n";
		  $vCard .= "VERSION:3.0\r\n";
		  $vCard .= "FN:" . $web_title . "\r\n";
		  $vCard .= "TITLE:" . $web_title . "\r\n";

		  if($email){
		    $vCard .= "EMAIL;TYPE=internet,pref:" . $email . "\r\n";
		  }
		  if($getPhoto){
		    $vCard .= "PHOTO;ENCODING=b;TYPE=JPEG:";
		    $vCard .= $photo . "\r\n";
		  }

		  if($contact){
		    $vCard .= "TEL;TYPE=work,voice:" . $contact . "\r\n"; 
		  }

		  $vCard .= "END:VCARD\r\n";
		  echo $vCard;
		}
	}
}	

?>