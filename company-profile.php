<?php

   include 'config.php';
   
   $subscribe=0;
    if (isset($_GET['cid'])) {
       $cid=$_GET['cid'];
       
        // print_r($_GET['cid']);exit;
       
       $qwe= "SELECT * FROM `company` WHERE `company_web_title`='".$cid."' ";
      //  echo $qwe;
      $select_companyy = mysqli_query($conn ,$qwe);
      $select_companyy_row= mysqli_fetch_array($select_companyy);
      if(mysqli_num_rows($select_companyy) > 0)
      {
            $query2 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'company' AND `company_id` = '".$select_companyy_row['company_id']."' AND `status`='0' LIMIT 1";
            $row2 = mysqli_query($conn,$query2);
            if(mysqli_num_rows($row2) > 0)
            {
                $fetch2 = mysqli_fetch_array($row2);
                $exp = date('Y/m/d',strtotime($fetch2['exp_date']));
                $today = date('Y/m/d');
                if($exp < $today){
                    // echo $exp.' < '.$today;
                    $fg = "UPDATE `package_purchased` SET `status`= '1'   WHERE `id` ='".$fetch2['id']."'";
                    mysqli_query($conn,$fg);
                    // exit;
        
                }elseif($fetch2['payment_status'] == 'TXN_SUCCESS'){
                    $subscribe=1;
                }else{}
            }
            // echo $subscribe;
         include('new_index.php');
      }else{
         include('index.php');
      }
         
      
      
         //   $select_company= mysqli_query($conn , "SELECT * FROM `company` WHERE `company_status` = '0' AND `company_id` = '".$select_companyy_row['company_id']."' ");
         //  $select_companyy_row= mysqli_fetch_array($select_company);
         //  print_r($select_companyy_row);
        
    }else{
       

    }
   ?>
