<?php

include('db_connect.php');

$id=$_GET['id'];
					$que = mysqli_query($conn,"SELECT * FROM `employee` WHERE `emp_id` = '".$id."'");
					$row = mysqli_fetch_array($que);
					$show = $row['emp_status'];
					if($show == 0)
					{
						$query ="UPDATE `employee` SET `emp_status`= 1 WHERE `emp_id` ='".$id."'";
						$result = mysqli_query ($conn,$query) or die (mysqli_error());
						header("Location:employee-list.php");
					}
					else
					{
						$query ="UPDATE `employee` SET `emp_status`= 0 WHERE `emp_id` ='".$id."'";
						$result = mysqli_query ($conn,$query) or die (mysqli_error());
					header("Location:employee-list.php");
					}

?>