<?php
	session_start();
	if($_SESSION['role'] != 1 || !isset($_SESSION)  ){
		echo "<script>
				alert('You are not supposed to be here ".$_SESSION['name']."');
				window.location.href='../index.php';
				</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Week5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <?php
		include("../model/databasecon.php");
		include("../include/config.php");
		$db = new database();
		
		
        $id= mysqli_real_escape_string($conn, $_POST['userid']);
        $FirstName= mysqli_real_escape_string($conn, $_POST['FirstName']);
        $LastName= mysqli_real_escape_string($conn, $_POST['LastName']);
        $alamat= mysqli_real_escape_string($conn, $_POST['alamat']); 
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$role = mysqli_real_escape_string($conn, $_POST['role']);
		
		$password = md5($pass);
		if($role == "teacher") $role = 2;
		else $role = 3;
        
        $db->query("INSERT INTO user(user_id, password, first_name, last_name, role_id, address) VALUES('$id', '$password', '$FirstName', '$LastName', $role, '$alamat');");
		if($role == 3){
			$db->query("INSERT INTO grade VALUES($id, 0, 0, 0);");
		}
		$db = null;
    ?>
    <script>
        alert("New record created successfully");
        window.location.href = "../view/admin_main.php";
    </script>
</body>
</html>