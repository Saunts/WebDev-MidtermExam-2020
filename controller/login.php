<?php
	session_start();
	include("../include/config.php");
	include("../model/databasecon.php");
	$db = new database();
	
	if(isset($_POST['submit']) && !empty($_POST['submit'])){
		$id =mysqli_real_escape_string($conn, $_POST['userid']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
			$result = $db->login($id, $password);
			
			if( isset( $_SESSION['role'] ) ) {
				  $_SESSION['role'] = 0;
			   }
			   
			if (mysqli_num_rows($result)) {
				$result = mysqli_fetch_array($result);
				$_SESSION['name'] = $result['first_name'];
				$_SESSION['id'] = $result['user_id'];
				if($result['role_id'] == 1){
					$_SESSION['role'] = 1;
					header('location: ..\view\admin_main.php');
				}
				else if($result['role_id'] == 2){
					$_SESSION['role'] = 2;
					header('location: ..\view\teacher_main.php');
				}
				else{
					$_SESSION['role'] = 3;
					header('location: ..\view\student_main.php');
				}
			}else{
				echo "<script>
					alert('Wrong ID or Password');
					window.location.href='../index.php';
					</script>";
				exit;
			}


		
	}
?>